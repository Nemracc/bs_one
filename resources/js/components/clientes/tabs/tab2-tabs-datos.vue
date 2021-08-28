<template>
  <!-- Tabs -->
  <div class="card-header">
    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
      <li class="nav-item">
        <a
          class="nav-link active"
          id="tab-general-tsb"
          data-toggle="pill"
          href="#tab-general"
          role="tab"
          aria-controls="tab-general"
          aria-selected="true"
          >General</a
        >
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          id="tab-actividades-cobranza-tab"
          data-toggle="pill"
          href="#tab-actividades-cobranza"
          role="tab"
          aria-controls="tab-actividades-cobranza"
          aria-selected="false"
          >Actividades</a
        >
      </li>

      <li class="nav-item">
        <a
          class="nav-link"
          id="tab-documentos-tab"
          data-toggle="pill"
          href="#tab-documentos"
          role="tab"
          aria-controls="tab-documentos"
          aria-selected="false"
          >Documentos</a
        >
      </li>

      <li class="nav-item">
        <a
          class="nav-link"
          id="tab-mapa-tab"
          data-toggle="pill"
          href="#tab-mapa"
          role="tab"
          aria-controls="tab-mapa"
          aria-selected="false"
          >Ubicacion</a
        >
      </li>
    </ul>
  </div>
  <!-- Tabs -->
</template>

<script>
export default {
  data() {
    return {};
  },
  props: [],
  methods: {},
};
</script>