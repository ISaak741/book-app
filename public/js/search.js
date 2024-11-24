document.addEventListener("DOMContentLoaded", function () {
    const searchButton = document.querySelector(".bi-search");
    const searchInput = document.querySelector(".form-control");
    const animeCheckbox = document.getElementById("animeCheckbox");
    const enfantCheckbox = document.getElementById("enfantCheckbox");
    const romanCheckbox = document.getElementById("romanCheckbox");
    const horeurCheckbox = document.getElementById("horeurCheckbox");
    const histoireCheckbox = document.getElementById("histoireCheckbox");
    const arabicCheckbox = document.getElementById("arabeCheckbox");
    const englishCheckbox = document.getElementById("anglaisCheckbox");
    const frenchCheckbox = document.getElementById("francaisCheckbox");
    const espagnolCheckbox = document.getElementById("espagnolCheckbox");
    let booksData = [];
    function fetchBooks() {
        fetch("/books/search")
            .then((response) => response.json())
            .then((data) => {
                booksData = data.books;
                updateResults();
            })
            .catch((error) => {
                console.error("Error fetching books:", error);
            });
    }
    fetchBooks();
    function filterBooks() {
        const query = searchInput.value.trim().toLowerCase();
        const selectedGenres = [];
        if (animeCheckbox.checked) {
            selectedGenres.push("anime");
        }
        if (horeurCheckbox.checked) {
            selectedGenres.push("horeur");
        }
        if (enfantCheckbox.checked) {
            selectedGenres.push("enfant");
        }
        if (romanCheckbox.checked) {
            selectedGenres.push("roman");
        }
        if (histoireCheckbox.checked) {
            selectedGenres.push("histoire");
        }
        const selectedLanguages = [];
        if (arabicCheckbox.checked) {
            selectedLanguages.push("arabe");
        }
        if (englishCheckbox.checked) {
            selectedLanguages.push("anglais");
        }
        if (frenchCheckbox.checked) {
            selectedLanguages.push("francais");
        }
        if (espagnolCheckbox.checked) {
            selectedLanguages.push("espagnol");
        }
        let filteredBooks = booksData.filter((book) => {
            if (
                selectedGenres.length > 0 &&
                !selectedGenres.includes(book.category.name.toLowerCase())
            ) {
                return false;
            }
            if (
                selectedLanguages.length > 0 &&
                !selectedLanguages.includes(book.language.name.toLowerCase())
            ) {
                return false;
            }
            return true;
        });
        if (query) {
            filteredBooks = filteredBooks.filter((book) =>
                book.title.toLowerCase().includes(query)
            );
        }
        return filteredBooks;
    }
    function updateResults() {
        let filteredBooks = filterBooks();
        displayResults(filteredBooks);
    }
    searchButton.addEventListener("click", updateResults);
    animeCheckbox.addEventListener("change", updateResults);
    enfantCheckbox.addEventListener("change", updateResults);
    histoireCheckbox.addEventListener("change", updateResults);
    horeurCheckbox.addEventListener("change", updateResults);
    romanCheckbox.addEventListener("change", updateResults);
    arabicCheckbox.addEventListener("change", updateResults);
    englishCheckbox.addEventListener("change", updateResults);
    frenchCheckbox.addEventListener("change", updateResults);
    espagnolCheckbox.addEventListener("change", updateResults);

    function displayResults(books) {
        const section = document.querySelector(".col-md-9.row.g-4.pb-5");
        section.innerHTML = "";
        books.forEach((book) => {
            const bookCard = document.createElement("div");
            bookCard.className = "col-md-4";
            bookCard.innerHTML = `
                <a class="col-md-4 text-decoration-none" href="book/display/${book.id}">
                    <div class="card shadow-lg rounded-2 border border-1 overflow-hidden">
                        <div class="p-2 bg-white d-flex justify-content-center align-items-center">
                            <img src="storage/${book.picture}" width="200" height="300" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-text text-center my-4">${book.title}</h5>
                        </div>
                    </div>
                </a>`;
            section.appendChild(bookCard);
        });
    }
});
