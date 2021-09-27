<template>
    <div>
        <h2>Total:{{ allData.total }}</h2>
        <h2>Good:{{ allData.good }}</h2>
        <h2>Fair:{{ allData.fair }}</h2>
        <h2>Neutral:{{ allData.neutral }}</h2>
        <h2>Bad:{{ allData.bad }}</h2>
        <h2>Good:{{ allData.goodPercent.toFixed(2) }}%</h2>
        <h2>Fair:{{ allData.fairPercent.toFixed(2) }}%</h2>
        <h2>Neutral:{{ allData.neutralPercent.toFixed(2) }}%</h2>
        <h2>Bad: {{ allData.badPercent.toFixed(2) }}%</h2>
    </div>
</template>

<script>
export default {

    mounted() {
        axios.get('/api/count')
            .then(response => this.allData = response.data)

    },
    data() {
        return {
            allData: '',
            total: '',
            good: '',
            fair: '',
            neutral: '',
            bad: '',
            goodPercent: '',
            fairPercent: '',
            neutralPercent: '',
            badPercent: '',

        }
    }
}

</script>
