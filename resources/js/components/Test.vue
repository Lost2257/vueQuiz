<template>
    <div :class="{'loading': loading}">
        <h1>TEST</h1>
        <p v-for="quiz in quizzes">{{ quiz.answer }}</p>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            quizzes: [],
            loading: true,
        }
    },
    mounted() {
        this.loadQuizzes();
    },
    methods: {
        loadQuizzes: function () {
            axios.get('/api/quizzes')
                .then((response) => {
                    this.quizzes = response.data.data;
                    this.loading = false;
                })
                .catch(function (error) {
                    console.log(error);
                });
            // setTimeout(this.loadQuizzes, 1000);
        }

    }
}
</script>
