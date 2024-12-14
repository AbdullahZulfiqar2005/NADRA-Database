<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="documents.css">
    <section class="document-section">
        <h1>Manage Documents</h1>
        <div class="actions">
            <button id="apply-document">Apply for Document</button>
            <button id="search-document">Search Documents list</button>
            <button >Filter Records</button>
        </div>
        <div id="sub-document">
        <button id="cnic">Apply for CNIC</button>
        <button id="passport">Apply for passport</button>
        <button id="b-form">Apply for B-form</button>
        </div>

    </section>

    <div class="cnic-form-container" id="cnic-form-container">
    <form action="submit_form.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="father-name">Father's Name:</label>
        <input type="text" id="father-name" name="father_name" required><br><br>

        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>


        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <label for="contact">Contact Number:</label>
        <input type="text" id="contact" name="contact" required><br><br>

        <button class = "search-button" type="submit">Submit</button>
    </form>
    </div>

    <div class="b-form-container" id="b-form-container">
    <form action="submit_form.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="father-name">Father's Name:</label>
        <input type="text" id="father-name" name="father_name" required><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <button class = "search-button" type="submit">Submit</button>
    </form>
    </div>

    <div id="search-bar-container">
        <input type="text" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
    </div>

<script>
     document.getElementById("apply-document").addEventListener("click", function(){
        const forms = document.getElementById("sub-document");
        if (forms.style.display === "none" || forms.style.display === "") {
            forms.style.display = "flex"; 
        } else {
            forms.style.display = "none"; 
        }
    });

    document.getElementById("cnic").addEventListener("click", function(){
        const forms = document.getElementById("cnic-form-container");
        if (forms.style.display === "none" || forms.style.display === "") {
            forms.style.display = "flex"; 
        } else {
            forms.style.display = "none"; 
        }
    });
    document.getElementById("passport").addEventListener("click", function(){
        const forms = document.getElementById("cnic-form-container");
        if (forms.style.display === "none" || forms.style.display === "") {
            forms.style.display = "flex"; 
        } else {
            forms.style.display = "none"; 
        }
    });
    document.getElementById("b-form").addEventListener("click", function(){
        const forms = document.getElementById("b-form-container");
        if (forms.style.display === "none" || forms.style.display === "") {
            forms.style.display = "flex"; 
        } else {
            forms.style.display = "none"; 
        }
    });
    document.getElementById("search-document").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("search-bar-container");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
        } else {
            searchBarContainer.style.display = "none"; 
        }
    });
</script>
</main>
<?php include 'includes/footer.php'; ?>
