<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <table id="main"  cellspacing="0">
        <tr>
            <td id='header'>
                <h1>User Data</h1>
            </td>
        </tr>
        <tr>
            <td id="load-data">
                <input type="button" id="load-btn" value="load data">
            </td>
        </tr>  
        <tr>
            <td id="table-data"></td>
        </tr>
    </table>
    
</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $("#load-btn").on("click",function(e){
            $.ajax({
                url :"load.php",
                type:"Post",
                success:function(data){
                    $("#table-data").html(data);
                }
            });
        });

    });
</script>
</html>