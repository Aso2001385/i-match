<template>
<div>
    <PartnerUserTit1></PartnerUserTit1>
    <div class="partner-user-detail">
        <div id="part-user-img-con"><p id="partner-user-image">◯</p></div>
        <p id="partner-user-name"><span>麻生太郎</span></p>
        <div class="partner-use-learn-skills" id="partner-use-skills">
            <p id="use-skills">●使えるスキル</p>
            <p class="use-learn-skills-list">Larabel・PHP・java・Python・Spring・JavaScript・React・Vue</p>
        </div>
        <div class="partner-use-learn-skills" id="partner-learn-skills">
            <p id="learn-skills">●学びたいスキル</p>
            <p class="use-learn-skills-list">Docker・Flask・AWS・Angular</p>
        </div>
    </div>
</div>
</template>
<script>
    import PartnerUserTit1 from './PartnerUserTit.vue'

      export default {
        components: {
            PartnerUserTit1,
        }
      }
</script>