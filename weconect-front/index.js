document.addEventListener('DOMContentLoaded', function() {
    // Define the API endpoint
    const apiEndpoint = 'http://localhost/api/articles';

    // Fetch articles from the API and display them
    fetch(apiEndpoint)
        .then(response => response.json())
        .then(articles => {
            const articlesList = document.querySelector('.articles-list');
            articlesList.innerHTML = ''; // Clear any existing content

            
            

            articles.forEach(article => {
                let image = 'https://via.placeholder.com/300x150';
                if(article.images !== null && article.images.length > 0) {
                    image = article.images[0]
                }
                articlesList.innerHTML += `
                    <article>
                        <div class="article-image">
                            <img src="${image}" alt="${article.title}">
                        </div>
                        <div class="article-content">
                            <h1>${article.title}</h1>
                            <p>${article.content}</p>
                        </div>
                    </article>
                `;
            });
        })
        .catch(error => console.error('Error fetching articles:', error));

    // Function to extract a text excerpt from the article content
    function getExcerpt(content) {
        const maxLength = 100; // Set the maximum length of the excerpt
        return content.length > maxLength ? content.substring(0, maxLength) + '...' : content;
    }
});
