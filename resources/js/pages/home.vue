<template>
  <card :title="$t('home_page')">{{ $t('welcome_to_anket_com') }}</card>
</template>

<script>
export default {
  metaInfo() {
    return { title: this.$t("home") };
  }
};
</script>
