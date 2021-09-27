<template>
<div class="container">
    <form  method="post" @submit.prevent="submit">
        <h1>How do you find our service? </h1>
        <div class="form-check">
        <input class="form-check-input" type="radio" id="good" name="answer" value="Good" v-model="fields.answer">
        <div v-if="errors && errors.answer">{{errors.answer[0]}}</div>
        <label class="form-check-label" for="good">Good</label>
        <br>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" id="fair" name="answer" value="Fair" v-model="fields.answer">
        <label class="form-check-label" for="fair">Fair</label>
        <div v-if="errors && errors.answer">{{errors.answer[0]}}</div>
        <br>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" id="neutral" name="answer" value="Neutral" v-model="fields.answer">
        <label class="form-check-label" for="neutral">Neutral</label>
        <div v-if="errors && errors.answer">{{errors.answer[0]}}</div>
        <br>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" id="bad" name="answer" value="Bad" v-model="fields.answer">
        <label class="form-check-label" for="bad">Bad</label>
        <div v-if="errors && errors.answer">{{errors.answer[0]}}</div>
        <br>
        </div>
        <h1>Picked: {{fields.answer}}</h1>
        <button class="btn btn-dark" type="submit">Submit answer</button>

        <div v-if="success">answer sent</div>

    </form>
</div>
</template>

<script>
export default {
    data() {
        return {
            answer: '',
            fields: {},
            errors: {},
            success: false,
            loaded: true,
        }
    },
    methods: {
        submit() {
            if (this.loaded) {
                this.loaded = false;
                this.success = false;
                this.errors = {};
                axios.post('/submit', this.fields).then(response => {
                    this.fields = {};
                    this.loaded = true;
                    this.success = true;
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    }
                });
            }
        },
    },
}
</script>