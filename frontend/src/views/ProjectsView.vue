<template>
  <v-container>
    <v-row>
      <v-col v-for="project in projects" :key="project.id" cols="12" md="4">
        <v-card>
          <v-img :src="project.image" height="200px"></v-img>
          <v-card-title>{{ project.name }}</v-card-title>
          <v-card-text>{{ project.description }}</v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted } from 'vue';

interface Project {
  id: number;
  name: string;
  description: string;
  image: string;
}

export default defineComponent({
  name: 'ProjectsView',
  setup() {
    const projects = ref<Project[]>([]);

    onMounted(async () => {
      try {
        const response = await fetch('/api/projects');
        projects.value = await response.json();
      } catch (error) {
        console.error('Error fetching projects:', error);
      }
    });

    return { projects };
  },
});
</script>
