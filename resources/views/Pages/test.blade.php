<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $page_title or "AdminLTE Dashboard" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @include("Partials.donner-head-scripts")

</head>
<body class="skin-blue">
<script>
    $.ajax(
            {
                url: '/',
                type: 'post',
                success: function(){
                    console.log("got the stats");
                },error: function(xhr, status, thrownError){
                alert(xhr.status+" ,"+" "+status+", "+thrownError);
            }
            }
    );
</script>
</body>
</html>