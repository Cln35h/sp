<!DOCTYPE html>
<html>
<head>
    <title>SP help</title>
    <script>
        function showCommittees() {
            var role = document.getElementById("roles").value;
            var committeeSection = document.getElementById("committeeSection");

            // Hide the committee section by default
            committeeSection.style.display = "none";

            // If the selected role is Committee Convener or Committee Member, display the committee section
            if (role === "cc" || role === "cm") {
                committeeSection.style.display = "block";
            }
        }
    </script>
</head>
<body>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $data = $_POST['data'];
    $role = $_POST['roles'];
    $committee = isset($_POST['committees']) ? $_POST['committees'] : '';

    // Display the user's name
    echo "User {$data['name']} is created and assigned the role as ";

    // Display the role
    if ($role === 'admin') {
        echo "Admin";
    } else {
        echo "Committee ";
        switch ($role) {
            case 'cc':
                echo "Convener";
                break;
            case 'cm':
                echo "Member";
                break;
            default:
                echo "Unknown";
        }

        // Display the committee if applicable
        if ($committee) {
            echo " of ";

            // Full names for committees
            switch ($committee) {
                case 'exam':
                    echo "Examination Committee";
                    break;
                case 'icc':
                    echo "Internal Complaint Committee";
                    break;
                case 'ggc':
                    echo "General Grievance Committee";
                    break;
                default:
                    echo "Unknown Committee";
            }
        }
    }

    echo ".<br>";
}
?>

<form method="post" action="">
    Enter name:
    <input name="data[name]" type="text">
    <br>
    Select Role:
    <select id="roles" name="roles" onchange="showCommittees()">
        <option value="admin">Admin</option>
        <option value="cc">Committee Convener</option>
        <option value="cm">Committee Member</option>
    </select>
    <br>

    <!-- Committee Section initially hidden -->
    <div id="committeeSection" style="display: none;">
        Select Committee:
        <select id="committees" name="committees">
            <option value="exam">Examination Committee</option>
            <option value="icc">Internal Complaint Committee</option>
            <option value="ggc">General Grievance Committee</option>
        </select>
        <br>
    </div>

    <input type="submit" value="Submit">
</form>

</body>
</html>
