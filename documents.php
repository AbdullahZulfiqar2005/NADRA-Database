<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="documents.css">
    <section class="document-section">
        <h1>Manage Documents</h1>
        <div class="actions">
            <button id="apply-document">Apply for Document</button>
        </div>
        <div id="sub-document">
        <button id="cnic">Apply for CNIC</button>
        <button id="passport">Apply for passport</button>
        </div>

    </section>

    <div class="cnic-form-container" id="cnic-form-container">
    <form action="submit_cnic.php" method="POST">
    <label for="citizen-id">Citizen ID:</label>
    <input type="number" id="citizen-id" name="citizen_id" required><br><br>

    <label for="card-type">Card Type:</label>
    <input type="text" id="card-type" name="card_type" required><br><br>

    <label for="issue-date">Issue Date:</label>
    <input type="date" id="issue-date" name="issue_date" required><br><br>

    <label for="expiry-date">Expiry Date:</label>
    <input type="date" id="expiry-date" name="expiry_date" required><br><br>

    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option value="Active">Active</option>
        <option value="Expired">Expired</option>
    </select><br><br>
        <button class = "search-button" type="submit">Submit</button>
    </form>
    </div>



    <div class="passport-form-container" id="passport-form-container">
    <form action="submit_passport.php" method="POST">
    <label for="citizen-id">Citizen ID:</label>
<input type="number" id="citizen-id" name="citizen_id" required><br><br>

<label for="application-date">Application Date:</label>
<input type="date" id="application-date" name="application_date" required><br><br>

<label for="passport-number">Passport Number:</label>
<input type="text" id="passport-number" name="passport_number"><br><br>

<label for="issue-date">Issue Date:</label>
<input type="date" id="issue-date" name="issue_date"><br><br>

<label for="expiry-date">Expiry Date:</label>
<input type="date" id="expiry-date" name="expiry_date" required><br><br>

<label for="application-status">Application Status:</label>
<select id="application-status" name="application_status" required>
    <option value="pending">Pending</option>
    <option value="approved">Approved</option>
    <option value="rejected">Rejected</option>
</select><br><br>


        <button class = "search-button" type="submit">Submit</button>
    </form>
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
        const forms = document.getElementById("passport-form-container");
        if (forms.style.display === "none" || forms.style.display === "") {
            forms.style.display = "flex"; 
        } else {
            forms.style.display = "none"; 
        }
    });

</script>
</main>
<?php include 'includes/footer.php'; ?>
