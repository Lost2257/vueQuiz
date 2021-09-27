<template>
    <div class="container">
<table class="table">
  <thead>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Total</th>
      <th scope="col">Good</th>
      <th scope="col">Fair</th>
      <th scope="col">Neutral</th>
      <th scope="col">Bad</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <th scope="row">Votes</th>
          <td>{{allData.total}}</td>
          <td>{{allData.good}}</td>
          <td>{{allData.fair}}</td>
          <td>{{allData.neutral}}</td>
          <td>{{allData.bad}}</td>
      </tr>
      <tr>
          <th scope="row">Percentage</th>
          <td>100%</td>
          <td>{{allData.goodPercent.toFixed(2)}}%</td>
          <td>{{allData.fairPercent.toFixed(2)}}%</td>
          <td>{{allData.neutralPercent.toFixed(2)}}%</td>
          <td>{{allData.badPercent.toFixed(2)}}%</td>
      </tr>
  </tbody>
</table>
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
    },
}

</script>
