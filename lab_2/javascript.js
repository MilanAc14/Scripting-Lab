let screen = ""; //initially screen is empty
let num1, num2, symbol; //at the loading of page values are undefined
function perform_(operation) {
  //switching operation
  let num1 = parseFloat(document.getElementById("operand_1").value);
  let num2 = parseFloat(document.getElementById("operand_2").value);
  switch (operation) {
    case "addition":
      screen = num1 + num2;
      symbol = "+";
      break;
    case "subtraction":
      screen = num1 - num2;
      symbol = "-";
      break;
    case "multiplication":
      screen = num1 * num2;
      symbol = "x";
      break;
    case "division":
      screen = num1 / num2;
      symbol = "÷";
      break;
    case "remainder":
      screen = num1 % num2;
      symbol = "%";
      break;
  }
  document.querySelector("#display").value =
    num1 + symbol + num2 + "=" + screen; //to display in screen
}
function clear_screen() {
  document.querySelector("#display").value = "";
  document.getElementById("operand_1").value = "";
  document.getElementById("operand_2").value = "";
}
