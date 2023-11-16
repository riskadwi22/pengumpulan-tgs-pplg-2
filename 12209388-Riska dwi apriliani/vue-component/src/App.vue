<template>
  <div class="row-service">
    <Card v-for="item in data" :title="item.title" :description="item.description">{{ item.date }}
    </Card>
  </div>
  <button class="btn-service">Detail</button>
  <MyBtn id="btn1" name="btn"></MyBtn>
  <MyBtn id="btn2" name="btn2"></MyBtn>
</template>

<script>
import Card from '@/components/my-components/card.vue';
export default{
  components: {
    Card,
    'card-service':Card
  },
  data() {
    return {
      data:[
        {
          title: 'title 1',
          description: 'description 1',
          date: '20 Juni 2021'
        },{
          title: 'title ',
          description: 'description 2',
          date: '16 April 2023'
        }
      ]
    }
  },
}
</script>
<style>
.row-service{
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}
.btn-service-global{
   margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: #cf6262;
    padding: 15px, 20px;
    border: none;
    border-radius: 5px;
    transition: 0.6s;
}
</style>