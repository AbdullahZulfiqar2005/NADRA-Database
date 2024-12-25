<?php include 'includes/header.php'; ?>

<style>
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

<h1 style="text-align: center;">Support & Complaints</h1>

<h2 style="text-align: center;">Tell us about our service</h2>
<form action="insert_support.php" method="POST">
    <input type="hidden" name="aid">

    <label for="id">ID:</label>
    <input type="text" id="id" value='' name="id"required>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name"  required>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required>

    <button type="submit">Update</button>
</form>

<?php include 'includes/footer.php'; ?>
