// Shows the deletion pop-up
document.getElementById('deleteAccount').addEventListener('click', function() {
    document.getElementById('deletionPopUp').classList.add('active');
});

// Hides the deletion pop-up
document.getElementById('deletionNo').addEventListener('click', function() {
    document.getElementById('deletionPopUp').classList.remove('active');
});

// Confirm deletion
document.getElementById('deletionYes').addEventListener('click', function() {
    window.location.href = 'scripts/accountDeletion.php';
});