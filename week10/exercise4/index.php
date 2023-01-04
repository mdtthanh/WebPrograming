<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Search Suggestions</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <div class="search-input">
            <input type="text" placeholder="Type to search..">
            <div class="autocom-box">
            </div>
        </div>
    </div>


    <script>
        const searchWrapper = document.querySelector(".search-input");
        const inputBox = searchWrapper.querySelector("input");
        const suggBox = searchWrapper.querySelector(".autocom-box");
        const img = searchWrapper.querySelector(".card-image");

        function select(element) {
            inputBox.value = element.textContent;
            searchWrapper.classList.remove("active");
        }

        function showSuggestions(list) {
            let listData;
            listData = !list.length ? `<li>${inputBox.value}</li>` : list.join('');
            suggBox.innerHTML = listData;
        }

        function handleSearch(e) {
            const cards = this;
            let userData = e.target?.value; //user entered data
            let emptyArray = [];
            if (userData) {
                emptyArray = cards.filter(data => data
                    .name
                    .toLocaleLowerCase()
                    .startsWith(userData.toLocaleLowerCase())
                );

                emptyArray = emptyArray.map(data => `<li>${data.name}</li>`);
                searchWrapper.classList.add("active"); //show autocomplete box
                showSuggestions(emptyArray);
                let allList = suggBox.querySelectorAll("li");

                for (let i = 0; i < allList.length; i++) {
                    //adding onclick attribute in all li tag
                    allList[i].setAttribute("onclick", "select(this)");
                }
            } else
                searchWrapper.classList.remove("active"); //hide autocomplete box
        }

        const getCards = async function() {
            try {
                const data = await fetch("https://db.ygoprodeck.com/api/v7/cardinfo.php");

                if (!data.ok) throw new Error("Problem getting cards data");

                const cards = await data.json();
                return cards.data;
            } catch (err) {
                console.error("Error: ", err);
            }
        }

        getCards()
            .then(cards => inputBox.addEventListener('input', handleSearch.bind(cards)))
            .catch(() => console.error("Error: Can't get card data"));
    </script>
</body>

</html>