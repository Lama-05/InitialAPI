<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <Center>
        <h1>Product</h1>

        <form action="{{route('PostAddProduct')}}" method="post" encType="multipart/form-data">
        @csrf
            Title: <input type="text" name="product_title" id="">
            <br><br>
            Category ID: <input type="text" name="category_id" id="">
            <br><br>
            Details: <input type="text" name="product_description" id="">
            <br><br>
            Cost: <input type="number" name="product_cost" id="">
            <br><br>
            Photo: <input type="file" name="product_image" id="">
            <br><br>
            <button type="submit" name="addProduct">Add</button>
        </form>
        
    </Center>
</body>
</html>