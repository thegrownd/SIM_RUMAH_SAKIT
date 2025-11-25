<!-- SCRIPT POPUP -->
<script>
function confirmDelete(url) {
    document.getElementById('deletePopup').style.display = 'flex';
    document.getElementById('confirmDeleteBtn').href = url;
}

function closePopup() {
    document.getElementById('deletePopup').style.display = 'none';
}
</script>

</body>
</html>
