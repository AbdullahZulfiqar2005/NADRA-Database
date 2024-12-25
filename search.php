<?php
include 'db_connection.php';  

if (isset($_GET['query'])) {
    $user_query = $_GET['query'];

    if (preg_match("/^SELECT/i", $user_query)) {
        if ($result = $conn->query($user_query)) {
            echo '<style>
            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                text-align: left;
            }

            table, th, td {
                border: 1px solid #ddd;
                padding: 10px;
            }

            th {
                background-color: #f2f2f2;
                text-align: center;
            }

            td {
                text-align: center;
            }

            form {
                width: 50%;
                margin: 20px auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 10px;
                background-color: #f9f9f9;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            form label {
                display: block;
                margin-bottom: 8px;
                font-weight: bold;
            }

            form input, form button {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            form button {
                background-color: #004aad;
                color: white;
                font-size: 16px;
                cursor: pointer;
            }

            form button:hover {
                background-color: #003580;
            }
          </style>';
            echo "<table><tr>";
            $columns = $result->fetch_fields();
            foreach ($columns as $col) {
                echo "<th>" . htmlspecialchars($col->name) . "</th>";
            }
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Error executing query: " . $conn->error;
        }
    } else {
        echo "Invalid query. Only SELECT queries are allowed.";
    }
} else {
    echo "Please enter a query.";
}

$conn->close();


?>
