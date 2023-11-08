<template lang="">
   <div>
    <Nuxt/>
   </div>
</template>
<script>
export default {
   created() {
      console.log(process.env.URL);
    }
}
</script>
