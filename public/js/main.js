var buttonEdit = document.getElementsByClassName("buttonEdit");
var buttonCancel = document.getElementsByClassName("cancel");
var addElt = document.getElementById("add");
var modifyElt = document.getElementById("modify");

function modifyForm() {
	addElt.style.display = "none";
	modifyElt.style.display = "block";
}

function addForm() {
	addElt.style.display = "block";
	modifyElt.style.display = "none";
}

buttonEdit.addEventListener("click", function()
	{
		console.log("clic!");
		modifyForm;
	});