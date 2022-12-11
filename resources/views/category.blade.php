<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
    <Center><h1>Category</h1></Center>
    @if(session('Message'))
    {{session('Message')}}
    @endif
    <Center>
        <form action="{{route('PostAddCategory')}}" method="Post" encType="multipart/form-data">
        @csrf()
            Title: <input type="text" name="category_title" id="">  
             <br><br>  
            Details: <input type="text" name="category_description" id="">
             <br><br>
            <button type="submit" value="AddCategory">Add</button>
            
            
        </form>
    </Center>

    

</body>
</html>