<?php include 'includes/header.php'; 
include 'db_connection.php'; 
?>
<main>
    <link rel="stylesheet" href="birth_death.css">
    <section class="birth_death-section">
        <h1>Birth & Death Records</h1>
        <div class="actions">
            <button id="new-birth">New Birth</button>
            <button id="birth-record">Citizen Birth Record</button>
            <button id="death-add">Add Death record</button>
            <button id="death-record">Citizen Death Record</button>
            <br>
            <button id="all">View Birth</button>
            <button id="alld">View Death</button>
        </div>
</section>

<div class="birth-form-container" id="birth-form-container">
    <form action="birth_submit_form.php"  id="form"  method="POST">
        <label for="citizen_id">ID:</label>
        <input type="text" id="citizen_id" name="citizen_id" required><br><br>

        <label for="birth_date">Date of Birth:</label>
        <input type="date" id="birth_date" name="birth_date" required><br><br>

        <label for="father_name">Father's Name:</label>
        <input type="text" id="father_name" name="father_name" required><br><br>

        <label for="birth_place">Place of birth:</label>
        <input type="text" id="birth_place" name="birth_place" required><br><br>

        <button class = "search-button" type="submit">Submit</button>
    </form>
</div>

<div class="death-form-container" id="death-form-container">
    <form action="death_submit_form.php"  id="form"  method="POST">
        <label for="citizen_id">ID:</label>
        <input type="text" id="citizen_id" name="citizen_id" required><br><br>

        <label for="date_of_death">Date of death:</label>
        <input type="date" id="date_of_death" name="date_of_death" required><br><br>

        <label for="cause_of_death">Cause of death:</label>
        <input type="text" id="cause_of_death" name="cause_of_death" required><br><br>

        <label for="place_of_death">Place of death:</label>
        <input type="text" id="place_of_death" name="place_of_death" required><br><br>

        <button class = "search-button" type="submit">Submit</button>
    </form>
</div>

    <div id="search-bar-container">
    <form action="search_birth.php" method="GET">

        <input type="text" name="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
</form>
    </div>
    <div id="death-search-bar-container">
    <form action="search_death.php" method="GET">

        <input type="text" name="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
</form>
    </div>

<div class="all" id = "full_detail">
    <table>
        <tr>
        <tr><th>Birth ID</th><th>ID</th><th>Birth Date</th><th>Place</th><th>Father Name</th></tr>
        </tr>
        <?php
    
    $sql = "SELECT * FROM birth_records";
    $stmt = $conn->prepare($sql);     
    $stmt->execute();
    $result = $stmt->get_result();
           while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['birth_record_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['citizen_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['birth_date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['birth_place']) . "</td>";
                echo "<td>" . htmlspecialchars($row['father_name']) . "</td>";
                echo "</tr>";
            }
        $conn->close();
        ?>
    </table>
</div>


<div class="alld" id="all_death">
    <table>
        <tr>
            <th>Death ID</th>
            <th>ID</th>
            <th>Death Date</th>
            <th>Death Place</th>
            <th>Cause of Death</th>
        </tr>
        <?php
        include 'db_connection.php'; 
        $sql = "SELECT * FROM death_records";
        $stmt = $conn->prepare($sql);
           
        
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        } else {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['death_record_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['citizen_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date_of_death']) . "</td>";
                echo "<td>" . htmlspecialchars($row['place_of_death']) . "</td>";
                echo "<td>" . htmlspecialchars($row['cause_of_death']) . "</td>";
                echo "</tr>";
            }
        }
        $conn->close();
        ?>
    </table>
</div>

    <script>
   function toggleSection(sectionId) {
    const sections = [
        "birth-form-container",
        "death-form-container",
        "search-bar-container",
        "death-search-bar-container",
        "full_detail",
        "all_death"
    ];

    // Get the target section
    const targetSection = document.getElementById(sectionId);

    // If the target section is already visible, hide it and return
    if (targetSection.style.display === "flex") {
        targetSection.style.display = "none";
        return;
    }

    // Hide all sections
    sections.forEach((id) => {
        document.getElementById(id).style.display = "none";
    });

    // Show the targeted section
    targetSection.style.display = "flex";
}

// Event Listeners for buttons
document.getElementById("new-birth").addEventListener("click", function () {
    toggleSection("birth-form-container");
});

document.getElementById("death-add").addEventListener("click", function () {
    toggleSection("death-form-container");
});

document.getElementById("birth-record").addEventListener("click", function () {
    toggleSection("search-bar-container");
});

document.getElementById("death-record").addEventListener("click", function () {
    toggleSection("death-search-bar-container");
});

document.getElementById("all").addEventListener("click", function () {
    toggleSection("full_detail");
});

document.getElementById("alld").addEventListener("click", function () {
    toggleSection("all_death");
});


</script>
</main>
<?php include 'includes/footer.php'; ?>
