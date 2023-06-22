<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dad jokes using ajax</title>
  
  <style>
    body{
      font-family:'sans serif';
      margin:20px;
      padding: 3rem;
      text-align:center;
      justify-content:center;
      align-items:center;
    }
    .container{
  
      width:50%;
      height: 350px;
      max-width:900px;
      margin:20px;
      margin-top:30px;
      background-color:grey;
      text-align: center;
      align-items:center;
      justify-content:center;
      border-radius:10%;
      }
      #heading{
        color:black;
        border-bottom:.1em solid white;
        letter-spacing: .2ch;
        margin:20px;
        padding: 15px;
        position: relative;
        font-size:35px;
      }
      #joke{
        height:80px;
        color:white;
       padding:15px;
        font-size: 18px;
        word-break: break-all;
        font-family:'sans serif';
      }
      button{
        background-color: transparent;
        outline: none!important;
        cursor: pointer;
        padding:10px;
        width:97%;
        height:auto;
        text-align: center;
        font-size:20px;
        transition: all ease-in-out.0s;
      }

    </style>
</head>
<body>
    <div class="container">
        <h2 id="heading">Joke of the Day</h2>
        <p id="joke"></p><br>
        <button onclick="get_random()">Get a random joke!</button>
    </div>
    <script>
    // Function to fetch and display a dad joke
    function get_random() {
      // Create an XMLHttpRequest object
      let  request = new XMLHttpRequest();

      // Define the request method and URL
      request.open('GET', 'https://icanhazdadjoke.com/');

      // Set the request headers to accept JSON response 
      request.setRequestHeader('Accept', 'application/json');
      // Send the request
      request.send();

      // Set the callback function to handle the response
      request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {
          // Parse the response JSON
          let response = JSON.parse(request.responseText);

          // Extract the joke from the response
          let joke = response.joke;

          // Update the HTML to display the joke
          document.querySelector("#joke").innerText=joke;
        }
      };

      
    }
  </script>
  
</body>
</html>
