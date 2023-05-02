<?php
include('functions.php');
// if (!isLoggedIn()) {
// 	$_SESSION['msg'] = "You must log in first";
// 	header('location: login.php');
// }
include('connection.php');
include('header.php');
?>

<div class="container-fluid">
    <h2>Search Results</h2>
    <?php
    if (isset($_GET['q']) && $_GET['q'] != '') {
        $query = $_GET['q'];
        $sql = "SELECT * FROM users WHERE firstname LIKE '%$query%' OR lastname LIKE '%$query%' OR email LIKE '%$query%'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>First Name</th>';
            echo '<th>Last Name</th>';
            echo '<th>Email</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['firstname'] . '</td>';
                echo '<td>' . $row['lastname'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No results found</p>';
        }
    } else {
        echo '<p>Please enter a search query</p>';
    }
    ?>
</div>
