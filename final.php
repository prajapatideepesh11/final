<!DOCTYPE html>
<html>

<head>
	<title>Insert Data</title>
	<style>	
	body {
  align-items: center;
  background-color: #000;
  display: flex;
  justify-content: center;
  height: 100vh;
}

.form {
  background-color: #15172b;
  border-radius: 20px;
  box-sizing: border-box;
  height: 500px;
  padding: 20px;
  width: 320px;
}

.title {
  color: #eee;
  font-family: sans-serif;
  font-size: 36px;
  font-weight: 600;
  margin-top: 30px;
}

.subtitle {
  color: #eee;
  font-family: sans-serif;
  font-size: 16px;
  font-weight: 600;
  margin-top: 10px;
}

.input-container {
  height: 40px;
  position: relative;
  width: 100%;
}

.ic1 {
  margin-top: 40px;
}

.ic2 {
  margin-top: 30px;
}

.input {
  background-color: #303245;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
}

.cut {
  background-color: #15172b;
  border-radius: 10px;
  height: 20px;
  left: 20px;
  position: absolute;
  top: -20px;
  transform: translateY(0);
  transition: transform 200ms;
  width: 76px;
}

.cut-short {
  width: 50px;
}

.input:focus ~ .cut,
.input:not(:placeholder-shown) ~ .cut {
  transform: translateY(8px);
}

.placeholder {
  color: #65657b;
  font-family: sans-serif;
  left: 20px;
  line-height: 14px;
  pointer-events: none;
  position: absolute;
  transform-origin: 0 50%;
  transition: transform 200ms, color 200ms;
  top: 20px;
}

.input:focus ~ .placeholder,
.input:not(:placeholder-shown) ~ .placeholder {
  transform: translateY(-30px) translateX(10px) scale(0.75);
}

.input:not(:placeholder-shown) ~ .placeholder {
  color: #808097;
}

.input:focus ~ .placeholder {
  color: #dc2f55;
}

.submit {
  background-color: #08d;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  cursor: pointer;
  font-size: 18px;
  height: 50px;
  margin-top: 38px;
  // outline: 0;
  text-align: center;
  width: 100%;
}

.submit:active {
  background-color: #06b;
}

</style>

</head>

<body>
	<center>

<h1>Storing Form data in Database</h1>
		<form action="add.php" method = "Post">
		<div class="form">
      <div class="title">Welcome</div>
      <div class="subtitle">Let's Add Data Into Database!</div>
      <div class="input-container ic1">
	  <input id="id" name = "id" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="id" name = "id" class="placeholder">ID</label>
		</div>
		<div class="input-container ic2">
        <input id="name" name ="name" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="name" name ="name" class="placeholder">Name</label>
      </div>
      <div class="input-container ic2">
        <input id="department" name = "department" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="department" name = "department" class="placeholder">Department</label>
      </div>
      <div class="input-container ic2">
        <input id="age" name = "age"  class="input" type="text" placeholder=" " />
        <div class="cut cut-short"></div>
        <label for="age" name = "age" class="placeholder">Age</>
      </div>
      <button type="text" class="submit">submit</button>
        </div>
   </form>
	

		/*<?php
		include 'connect.php';?>*/
		<?php

		$conn = mysqli_connect("localhost", "root", "Qwer@1234", "demo01");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
        $id = $_REQUEST['id'];
		$name = $_REQUEST['name'];
		$department = $_REQUEST['department'];
		$age = $_REQUEST['age'];
	
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO employee VALUES ('$id','$name',
			'$department','$age')";
		
		if(mysqli_query($conn, $sql)){
			echo "<br><h3>Data Stored in a database successfully."
				. " Please browse your Database"
				. " to view the updated data</h3>";
        
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
		<a href="index.html"><button  class="button">Home</button></a>
	</center>
</body>

</html>
