<?php
session_start();
if (!($_SESSION["isLoggedIn"] ?? false)) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminDashboard</title>
</head>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}
/* Navbar */
.navbar{
    background:#1e1e2f;
    color:white;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
   
    
    width:100%;
   
}
.navbar a{
    color:aliceblue;
    text-decoration:none;
    margin-left:10px;
}
 .logoutbtn{
    color: #0b075d;

    background-color: rgb(45, 18, 118);
    padding: 5px 10px;
   
   
    font-family: bolder;
}


th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
.btn {
    padding: 6px 12px;

  
    cursor: pointer;
}



</style>
<body>
    
   <div class="navbar">
    <h5>Admin Dashboard</h5>
        <a href="adminDashboard.html">Dashboard</a>
        <a href="AssignComplaints.html">Assign Complaints</a>
        <a href="profile.html">Profile</a>
       
      <a href="../../Controller/Logout.php" class="logoutbtn">Logout</a>
   </div>
    <table style="width: 100%;">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Complaint</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <tr>
            <td>1</td>
            <td>Ridwan</td>
            <td>Internet Issue</td>
            <td class="status-pending">Pending</td>
            <td>
                <button class="btn btn-approve">Approve</button>
                <button class="btn btn-reject">Reject</button>
                 <button class="btn btn-edit">Edit</button>
            </td>
        </tr>

      
    </table>
    
</body>
</html>