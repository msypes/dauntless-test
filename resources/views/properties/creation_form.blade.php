<!DOCTYPE html>
<html>
<head>
    <title>Add A Property</title>
</head>
<body>
<h1>Add a Property</h1>
<form method="post" action="{{ url('properties') }}"  enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="input-wrapper">
        <label for="name">Property Name</label> <input type="text" name="name" id="name" value="" />
    </div>
    <div class="input-wrapper">
        <label for="address">Location</label> <input type="text" name="address" id="address" value="" />
    </div>
    <div class="input-wrapper">
        <label for="description">Description</label> <textarea name="description" id="description" value="" ></textarea>
    </div>
    <div class="input-wrapper">
        <label for="image">Photo</label> <input type="file" name="image" id="image" />
    </div>
    <div class="input-wrapper">
        <label for="start_date">Start Date</label> <input type="date" name="start_date" id="start_date" value="" />
    </div>
    <div class="input-wrapper">
        <label for="end_date">End Date</label> <input type="date" name="end_date" id="end_date" value="" />
    </div>
    <div class="input-wrapper"><input type="submit"name="submit" value="Add Property"></div>
</form>
</body>
</html>
