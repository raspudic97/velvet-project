<?php require_once 'views/partials/top.php' ?>
<?php require_once 'views/partials/navbar.php' ?>

<div id="news" class="news-container">
    <h3 class="news-title">Top news today</h3>

    <div class="cards-container">
        <div class="cards" v-for="result in results" :key="result.title">
            <div class="result-card">
                <img :src="result.image">
                <div class="card-info">
                    <h3>{{ result.title }}</h3>
                    <p>{{ result.description }}</p>
                    <a :href="result.url" target="_blank" >Read more...</a>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var news = new Vue({
        el: '#news',
        data: {
            results: []
        },
        methods: {
            getNews: function() {
                fetch('https://gnews.io/api/v4/top-headlines?token=70e49a92f0ae103bc27e0533eddcc01e&lang=en')
                    .then(response => response.json())
                    .then(data => this.results = data.articles);
            }
        },
        created() {
            this.getNews()
        }
    })
</script>
<?php require_once 'views/partials/bottom.php' ?>