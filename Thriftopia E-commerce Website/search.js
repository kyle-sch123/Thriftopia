function showResults(query) {
    if (query.length == 0) {
        document.getElementById("search-results").innerHTML = "";
        return;
    }
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("search-results").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "search.php?q=" + query, true);
    xhr.send();
};