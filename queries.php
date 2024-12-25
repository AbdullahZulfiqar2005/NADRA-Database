<?php include 'includes/header.php'; ?>
<style>
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
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
    </style>
</head>
<body>
    <form action="search.php" method="GET">
        <input type="text" name="query" placeholder="Enter SQL query" required>
        <button type="submit">Search</button>
    </form>
<?php include 'includes/footer.php'; ?>
