<template>
  <div class="home-container">
    <!-- Hero Section with Material Design -->
    <v-row justify="center" class="hero-section">
      <v-col cols="12" md="10" lg="8" class="text-center">
        <v-fade-transition appear>
          <div class="hero-content">
            <!-- Floating Profile Avatar with Material Elevation -->
            <div class="profile-container">
              <v-avatar 
                size="220" 
                class="profile-avatar elevation-12"
                role="button"
                aria-label="View profile"
                @click="avatarClicked"
              >
                <v-img 
                  :src="profileImage"
                  alt="Profile picture of Arjun"
                  cover
                  class="profile-image"
                >
                  <template v-slot:placeholder>
                    <v-icon size="120" color="grey-lighten-3">mdi-account</v-icon>
                  </template>
                </v-img>
                <div class="avatar-overlay"></div>
              </v-avatar>
              
              <!-- Status Indicator -->
              <v-chip 
                class="status-chip elevation-4" 
                color="success" 
                size="small"
                variant="elevated"
              >
                <v-icon start size="small">mdi-circle</v-icon>
                Available for Work
              </v-chip>
            </div>

            <!-- Hero Text with Material Typography -->
            <div class="hero-text">
              <div class="header-row">
                <h1 class="display-1 font-weight-light mb-2 hero-title header-title-inline">
                  <span class="gradient-text">Arjun Developer</span>
                </h1>
                <div class="header-socials-inline">
                  <v-btn icon href="https://github.com/arjunnair93" target="_blank" aria-label="GitHub" class="header-social-btn">
                    <v-icon size="28">mdi-github</v-icon>
                  </v-btn>
                  <v-btn icon href="https://www.linkedin.com/in/arjun-nair-0b516a46/" target="_blank" aria-label="LinkedIn" class="header-social-btn">
                    <v-icon size="28">mdi-linkedin</v-icon>
                  </v-btn>
                  <v-btn icon href="mailto:arjurokz@gmail.com" aria-label="Email" class="header-social-btn">
                    <v-icon size="28">mdi-email</v-icon>
                  </v-btn>
                </div>
              </div>
              <h2 class="header-subtitle mb-4">
                Building beautiful, performant web experiences
              </h2>

              <p class="headline font-weight-regular mb-8 hero-subtitle">
                Crafting digital experiences with 
                <span class="text-primary font-weight-medium">modern technologies</span>
                <br>
                Full-stack developer passionate about innovation
              </p>

              <!-- Material Action Buttons -->
              <div class="cta-section">
                <v-btn 
                  color="primary" 
                  variant="elevated" 
                  size="x-large"
                  class="cta-primary elevation-8"
                  rounded="pill"
                  @click="scrollToProjects"
                >
                  <v-icon start size="large">mdi-rocket-launch</v-icon>
                  Explore My Work
                </v-btn>

                <v-btn 
                  color="surface-variant" 
                  variant="outlined" 
                  size="large"
                  class="cta-secondary ml-4"
                  rounded="pill"
                  @click="downloadCV"
                >
                  <v-icon start>mdi-file-download</v-icon>
                  Download Resume
                </v-btn>
              </div>
            </div>
          </div>
        </v-fade-transition>
      </v-col>
    </v-row>

    <!-- Material Cards Section -->
    <v-row class="content-section" ref="projectsRef" no-gutters>
      <!-- Latest Projects Card -->
      <v-col cols="12" lg="6" class="pa-4 d-flex">
        <v-slide-y-transition appear>
          <v-card 
            class="projects-card material-card elevation-16 flex-fill" 
            rounded="xl"
            hover
          >
            <div class="card-header">
              <div class="header-icon-container">
                <v-icon 
                  size="40" 
                  color="primary" 
                  class="header-icon"
                >
                  mdi-code-braces
                </v-icon>
              </div>
              <div>
                <v-card-title class="card-title">
                  Latest Projects
                </v-card-title>
                <v-card-subtitle class="card-subtitle">
                  Recent work and achievements
                </v-card-subtitle>
              </div>
            </div>

            <v-card-text class="card-content">
              <v-list class="project-list" bg-color="transparent">
                <v-list-item 
                  v-for="(project, index) in latestProjects" 
                  :key="project.id"
                  class="project-item elevation-2"
                  rounded="lg"
                  @click="openProject(project)"
                >
                  <template v-slot:prepend>
                    <v-avatar 
                      :size="48" 
                      :color="project.color"
                      class="project-avatar elevation-6"
                    >
                      <v-icon color="white" size="24">{{ project.icon }}</v-icon>
                    </v-avatar>
                  </template>

                  <div class="project-content">
                    <v-list-item-title class="project-title">
                      {{ project.title }}
                    </v-list-item-title>

                    <v-list-item-subtitle class="project-description">
                      {{ project.description }}
                    </v-list-item-subtitle>

                    <div class="project-tech">
                      <v-chip 
                        v-for="tech in project.tech.slice(0, 2)" 
                        :key="tech"
                        size="x-small"
                        variant="tonal"
                        class="tech-chip"
                      >
                        {{ tech }}
                      </v-chip>
                      <span v-if="project.tech.length > 2" class="tech-more">
                        +{{ project.tech.length - 2 }} more
                      </span>
                    </div>
                  </div>

                  <template v-slot:append>
                    <v-btn
                      icon
                      variant="text"
                      size="small"
                      class="project-action"
                    >
                      <v-icon>mdi-arrow-right</v-icon>
                    </v-btn>
                  </template>
                </v-list-item>
              </v-list>

              <div class="card-action">
                <v-btn 
                  variant="text" 
                  color="primary" 
                  size="large"
                  @click="$router.push('/projects')"
                >
                  View All Projects
                  <v-icon end>mdi-arrow-right</v-icon>
                </v-btn>
              </div>
            </v-card-text>
          </v-card>
        </v-slide-y-transition>
      </v-col>

      <!-- Skills Overview Card -->
      <v-col cols="12" lg="6" class="pa-4 d-flex">
        <v-slide-y-transition appear>
          <v-card 
            class="skills-card material-card elevation-16 flex-fill" 
            rounded="xl"
            hover
          >
            <div class="card-header">
              <div class="header-icon-container">
                <v-icon 
                  size="40" 
                  color="secondary" 
                  class="header-icon"
                >
                  mdi-lightning-bolt
                </v-icon>
              </div>
              <div>
                <v-card-title class="card-title">
                  Technical Skills
                </v-card-title>
                <v-card-subtitle class="card-subtitle">
                  Technologies I work with
                </v-card-subtitle>
              </div>
            </div>

            <v-card-text class="card-content">
              <div class="skills-grid">
                <div 
                  v-for="skill in skills" 
                  :key="skill.name"
                  class="skill-item elevation-4"
                  @click="showSkillDetails(skill)"
                >
                  <div class="skill-header">
                    <v-icon 
                      :color="skill.color" 
                      size="28"
                      class="skill-icon"
                    >
                      {{ skill.icon }}
                    </v-icon>
                    <span class="skill-name">{{ skill.name }}</span>
                  </div>
                  
                  <div class="skill-progress">
                    <v-progress-linear
                      :model-value="skill.level"
                      :color="skill.color"
                      height="6"
                      rounded
                      class="skill-bar"
                    ></v-progress-linear>
                    <span class="skill-level">{{ skill.level }}%</span>
                  </div>
                </div>
              </div>

              <div class="card-action">
                <v-btn 
                  variant="text" 
                  color="secondary" 
                  size="large"
                  @click="$router.push('/skills')"
                >
                  View All Skills
                  <v-icon end>mdi-arrow-right</v-icon>
                </v-btn>
              </div>
            </v-card-text>
          </v-card>
        </v-slide-y-transition>
      </v-col>
    </v-row>

    <!-- Statistics Section with Material Design -->
    <v-row class="stats-section" no-gutters>
      <v-col cols="12" class="pa-4">
        <v-slide-y-transition appear>
          <v-card class="stats-card material-card elevation-12" rounded="xl">
            <v-card-text class="pa-8">
              <v-row class="stats-row" no-gutters>
                <v-col 
                  v-for="(stat, index) in statistics" 
                  :key="stat.label"
                  cols="6" 
                  md="3"
                  class="stat-col"
                >
                  <div class="stat-container">
                    <div class="stat-icon-wrapper">
                      <v-icon 
                        :color="getStatColor(index)" 
                        size="32"
                        class="stat-icon"
                      >
                        {{ getStatIcon(index) }}
                      </v-icon>
                    </div>
                    <div class="stat-number">{{ stat.value }}</div>
                    <div class="stat-label">{{ stat.label }}</div>
                  </div>
                </v-col>
              </v-row>
            </v-card-text>
          </v-card>
        </v-slide-y-transition>
      </v-col>
    </v-row>

    <!-- Material Snackbar -->
    <v-snackbar 
      v-model="snackbar.show" 
      :color="snackbar.color" 
      :timeout="4000" 
      location="bottom center"
      rounded="pill"
      class="material-snackbar elevation-8"
    >
      <div class="snackbar-content">
        <v-icon class="mr-2">{{ getSnackbarIcon() }}</v-icon>
        {{ snackbar.message }}
      </div>
      <template v-slot:actions>
        <v-btn 
          @click="snackbar.show = false" 
          icon 
          size="small"
          variant="text"
          aria-label="Close notification"
        >
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
    </v-snackbar>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, reactive, computed } from 'vue'
import { useRouter } from 'vue-router'
import arjunImage from '@/assets/arjun.jpg'

interface Project {
  id: number
  title: string
  description: string
  tech: string[]
  icon: string
  color: string
}

interface Skill {
  name: string
  icon: string
  color: string
  level: number
}

interface Statistic {
  label: string
  value: string
}

export default defineComponent({
  name: 'HomeView',
  setup() {
    const router = useRouter()
    const projectsRef = ref<HTMLElement | null>(null)
    const selectedSkills = ref<number[]>([])

    const snackbar = reactive({
      show: false,
      message: '',
      color: 'success'
    })

    const latestProjects: Project[] = [
      {
        id: 1,
        title: 'Modern Portfolio',
        description: 'Responsive portfolio with Vue.js, TypeScript and Material Design',
        tech: ['Vue.js', 'TypeScript', 'Vuetify', 'Laravel'],
        icon: 'mdi-web',
        color: 'primary'
      },
      {
        id: 2,
        title: 'E-commerce Platform',
        description: 'Full-stack commerce solution with payment integration',
        tech: ['React', 'Node.js', 'MongoDB', 'Stripe'],
        icon: 'mdi-shopping',
        color: 'secondary'
      },
      {
        id: 3,
        title: 'Task Management',
        description: 'Collaborative workspace with real-time collaboration',
        tech: ['Vue.js', 'Socket.io', 'PostgreSQL', 'Docker'],
        icon: 'mdi-clipboard-check',
        color: 'success'
      }
    ]

    const skills: Skill[] = [
      { name: 'Vue.js', icon: 'mdi-vuejs', color: 'green-darken-2', level: 92 },
      { name: 'Laravel', icon: 'mdi-laravel', color: 'red-darken-2', level: 88 },
      { name: 'TypeScript', icon: 'mdi-language-typescript', color: 'blue-darken-2', level: 85 },
      { name: 'Docker', icon: 'mdi-docker', color: 'light-blue-darken-2', level: 78 },
      { name: 'MySQL', icon: 'mdi-database', color: 'orange-darken-2', level: 90 },
      { name: 'REST APIs', icon: 'mdi-api', color: 'purple-darken-2', level: 94 }
    ]

    const statistics: Statistic[] = [
      { label: 'Projects Completed', value: '28+' },
      { label: 'Years Experience', value: '3.5+' },
      { label: 'Technologies', value: '18+' },
      { label: 'Happy Clients', value: '65+' }
    ]

    const getStatIcon = (index: number) => {
      const icons = ['mdi-check-circle', 'mdi-calendar-clock', 'mdi-cog', 'mdi-heart']
      return icons[index] || 'mdi-star'
    }

    const getStatColor = (index: number) => {
      const colors = ['success', 'info', 'warning', 'error']
      return colors[index] || 'primary'
    }

    const getSnackbarIcon = () => {
      return snackbar.color === 'success' ? 'mdi-check-circle' : 'mdi-information'
    }

    const showNotification = (message: string, color = 'success') => {
      snackbar.message = message
      snackbar.color = color
      snackbar.show = true
    }

    const avatarClicked = () => {
      showNotification('Welcome to my portfolio.')
    }

    const scrollToProjects = () => {
      if (projectsRef.value) {
        projectsRef.value.scrollIntoView({ behavior: 'smooth' })
      }
    }

    const downloadCV = () => {
      showNotification('Preparing resume download...', 'info')
      setTimeout(() => {
        window.open('/cv.pdf', '_blank')
      }, 500)
    }

    const openProject = (project: Project) => {
      showNotification(`Loading ${project.title}...`, 'info')
      setTimeout(() => {
        router.push(`/projects/${project.id}`)
      }, 300)
    }

    const showSkillDetails = (skill: Skill) => {
      showNotification(`${skill.name} - ${skill.level}% proficiency level`, 'info')
    }

    return {
      latestProjects,
      skills,
      statistics,
      selectedSkills,
      snackbar,
      projectsRef,
      avatarClicked,
      scrollToProjects,
      downloadCV,
      openProject,
      showSkillDetails,
      getStatIcon,
      getStatColor,
      getSnackbarIcon,
      profileImage: arjunImage
    }
  }
})
</script>

<style lang="scss" scoped>
/* -----------------------------
   Design Tokens / Foundations
-------------------------------- */
$gradient-bg: linear-gradient(135deg, #4c6edb 0%, #6b52b6 60%, #7a4fa8 100%);
$surface-glass: rgba(var(--v-theme-surface), 0.85);
$radius-lg: 18px;
$ease-standard: cubic-bezier(.4,0,.2,1);
$transition: .28s $ease-standard;
$shadow-sm: 0 4px 12px -2px rgba(31,38,135,.18);
$shadow-md: 0 8px 28px -6px rgba(31,38,135,.28);
$focus-ring: 0 0 0 3px rgba(25,118,210,.35);

/* Page Wrapper */
.home-container { 
  background: rgb(var(--v-theme-background)); 
  padding: 0; 
  min-height: 100vh; 
  overflow: hidden;
}

/* Hero */
.hero-section { 
  position: relative; 
  min-height: 92vh; 
  display: flex; 
  align-items: center; 
  background: $gradient-bg; 
  color: #fff; 
  border-radius: 0 0 24px 24px;
  overflow: hidden;
}
.hero-section::before { content:""; position:absolute; inset:0; background:radial-gradient(circle at 35% 40%, rgba(255,255,255,.25), transparent 60%),radial-gradient(circle at 70% 65%, rgba(255,255,255,.18), transparent 55%); mix-blend-mode:overlay; }
.hero-section::after { content:""; position:absolute; inset:0; background-image:linear-gradient(rgba(255,255,255,.05) 1px,transparent 1px),linear-gradient(90deg, rgba(255,255,255,.05) 1px,transparent 1px); background-size:48px 48px; mask:linear-gradient(to bottom, rgba(0,0,0,.25), rgba(0,0,0,.9)); }
.hero-content { position:relative; z-index:1; }

/* Avatar */
.profile-container { position:relative; margin-bottom:2.25rem; }
.profile-avatar { border:3px solid rgba(255,255,255,.35); backdrop-filter:blur(6px) saturate(140%); transition:$transition; box-shadow:$shadow-sm; }
.profile-avatar:hover, .profile-avatar:focus-visible { transform:translateY(-6px); border-color:rgba(255,255,255,.6); box-shadow:$shadow-md; }
.status-chip { position:absolute; bottom:14px; right:14px; background:rgba(56,142,60,.95)!important; color:#fff!important; font-weight:500; }

/* Headings & Intro */
.header-row { display:flex; flex-wrap:wrap; justify-content:center; align-items:center; gap:1.25rem; margin-bottom:.75rem; }
.header-title-inline { margin-bottom:0!important; }
.gradient-text { background:linear-gradient(90deg,#fff,#e9eef7 55%,#dbe4f4); -webkit-background-clip:text; background-clip:text; -webkit-text-fill-color:transparent; }
.header-socials-inline { display:flex; gap:1rem; }
.header-social-btn { background:rgba(255,255,255,.14)!important; color:#fff!important; transition:background .2s; }
.header-social-btn:hover { background:rgba(255,255,255,.26)!important; color:#e3f2fd!important; }
.header-subtitle { font-size:1.35rem; font-weight:400; color:#f2f6fb; letter-spacing:.4px; }
.hero-subtitle { color:#f5f7fa; max-width:640px; margin:.5rem auto 2.2rem; line-height:1.55; font-size:1.05rem; }

/* CTAs */
.cta-section { display:flex; justify-content:center; flex-wrap:wrap; gap:1rem; }
.cta-primary { background:linear-gradient(90deg,#4c6edb,#6b52b6)!important; letter-spacing:.5px; transition:$transition; }
.cta-primary:hover, .cta-primary:focus-visible { transform:translateY(-3px); box-shadow:$shadow-md; }
.cta-secondary { border-color:rgba(255,255,255,.55)!important; color:#fff!important; transition:$transition; }
.cta-secondary:hover, .cta-secondary:focus-visible { background:rgba(255,255,255,.14)!important; transform:translateY(-3px); }
.cta-section .v-btn:focus-visible { outline:none; box-shadow:$focus-ring; }

/* Sections */
.content-section { padding:3.5rem 0; }
.material-card { 
  background: rgba(var(--v-theme-surface), 0.9); 
  backdrop-filter: blur(18px) saturate(170%); 
  border: 1px solid rgba(var(--v-theme-primary), 0.12); 
  transition: $transition; 
  border-radius: $radius-lg;
  display: flex;
  flex-direction: column;
}
.material-card:hover, .material-card:focus-within { 
  transform: translateY(-6px); 
  box-shadow: $shadow-md; 
  border-color: rgba(var(--v-theme-primary), 0.25); 
}
.card-header { display:flex; align-items:center; padding:1.75rem 1.75rem 1rem; }
.header-icon-container { width:60px; height:60px; border-radius:16px; background:rgba(255,255,255,.18); display:flex; align-items:center; justify-content:center; margin-right:1rem; }
.card-title { font-size:1.4rem; font-weight:600; color:#1f2a37; padding:0; }
.card-subtitle { color:#5f6b7a; font-size:.85rem; margin-top:.25rem; padding:0; letter-spacing:.3px; }

/* Dark mode text improvements */
.theme--dark .card-title { color: #ffffff; }
.theme--dark .card-subtitle { color: #b0bec5; }
.theme--dark .project-title { color: #ffffff; }
.theme--dark .project-description { color: #b0bec5; }
.theme--dark .skill-name { color: #ffffff; }
.theme--dark .skill-level { color: #b0bec5; }
.theme--dark .stat-number { color: #ffffff; }
.theme--dark .stat-label { color: #b0bec5; }
.card-content { padding:0 1.75rem 1.75rem; }

/* Project List */
.project-item { 
  margin-bottom: .85rem; 
  padding: 1.25rem 1.15rem 1.05rem; 
  background: rgba(var(--v-theme-surface), 0.7); 
  border: 1px solid rgba(var(--v-theme-primary), 0.12); 
  border-radius: 14px; 
  transition: $transition; 
  cursor: pointer; 
}
.project-item:hover { 
  transform: translateY(-4px); 
  box-shadow: 0 10px 24px -6px rgba(var(--v-theme-primary), 0.3); 
  border-color: rgba(var(--v-theme-primary), 0.35); 
}
.project-title { font-weight:600; color:#1f2a37; font-size:1.05rem; }
.project-description { color:#5f6b7a; margin:.4rem 0 .35rem; line-height:1.4; }
.project-tech { display:flex; align-items:center; gap:.45rem; margin-top:.55rem; }
.tech-chip { height:22px; font-size:.68rem; font-weight:500; }
.project-action { opacity:0; transition:opacity .25s $ease-standard; }
.project-item:hover .project-action { opacity:1; }

/* Skills */
.skills-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:1rem; margin-bottom:1.75rem; }
.skill-item { 
  padding: 1.15rem 1.05rem 1.05rem; 
  border-radius: 14px; 
  background: rgba(var(--v-theme-surface), 0.7); 
  border: 1px solid rgba(var(--v-theme-primary), 0.12); 
  transition: $transition; 
  cursor: pointer; 
}
.skill-item:hover, .skill-item:focus-visible { 
  transform: translateY(-5px); 
  box-shadow: $shadow-md; 
  border-color: rgba(var(--v-theme-primary), 0.35); 
}
.skill-item:focus-visible { outline:none; box-shadow:$focus-ring; }
.skill-header { display:flex; align-items:center; margin-bottom:.85rem; }
.skill-icon { margin-right:.65rem; }
.skill-name { font-weight:600; color:#1f2a37; font-size:.95rem; }
.skill-progress { display:flex; align-items:center; gap:.6rem; }
.skill-level { font-size:.75rem; font-weight:500; color:#5f6b7a; min-width:32px; }

/* Stats */
.stats-section { padding:2rem 0 3.5rem; }
.stats-card { background:rgba(var(--v-theme-surface), 0.96); }
.stats-row .stat-col { padding:.85rem; }
.stat-icon-wrapper { width:58px; height:58px; border-radius:16px; background:linear-gradient(135deg, rgba(255,255,255,.55), rgba(255,255,255,.25)); backdrop-filter:blur(8px) saturate(180%); display:flex; align-items:center; justify-content:center; margin:0 auto .75rem; box-shadow:0 4px 14px -4px rgba(31,38,135,.28); }
.stat-number { font-size:2.15rem; font-weight:600; color:#1f2a37; letter-spacing:.4px; }
.stat-label { font-size:.7rem; color:#5f6b7a; margin-top:.3rem; font-weight:600; text-transform:uppercase; letter-spacing:.9px; }

/* Snackbar */
.material-snackbar .snackbar-content { display:flex; align-items:center; font-weight:500; }

/* Dark mode improvements for better text readability */
.theme--dark .material-card { 
  background: rgba(var(--v-theme-surface), 0.95); 
  border: 1px solid rgba(var(--v-theme-primary), 0.2); 
}
.theme--dark .project-item { 
  background: rgba(var(--v-theme-surface), 0.8); 
  border: 1px solid rgba(var(--v-theme-primary), 0.2); 
}
.theme--dark .skill-item { 
  background: rgba(var(--v-theme-surface), 0.8); 
  border: 1px solid rgba(var(--v-theme-primary), 0.2); 
}

/* Dark mode text colors for better readability */
.v-theme--dark .section-title,
.theme--dark .section-title {
  color: #ffffff !important;
}

.v-theme--dark .section-subtitle,
.theme--dark .section-subtitle {
  color: #b0bec5 !important;
}

.v-theme--dark .project-title,
.theme--dark .project-title {
  color: #ffffff !important;
}

.v-theme--dark .project-description,
.theme--dark .project-description {
  color: #b0bec5 !important;
}

.v-theme--dark .skill-name,
.theme--dark .skill-name {
  color: #ffffff !important;
}

.v-theme--dark .skill-level,
.theme--dark .skill-level {
  color: #90a4ae !important;
}

.v-theme--dark .stat-number,
.theme--dark .stat-number {
  color: #ffffff !important;
}

.v-theme--dark .stat-label,
.theme--dark .stat-label {
  color: #90a4ae !important;
}

.v-theme--dark .card-title,
.theme--dark .card-title {
  color: #ffffff !important;
}

.v-theme--dark .card-subtitle,
.theme--dark .card-subtitle {
  color: #b0bec5 !important;
}

/* Header socials (hero) - keep existing structure */
.header-social-btn:focus-visible { outline:none; box-shadow:$focus-ring; }

/* Responsive */
@media (max-width: 900px) { .hero-section { min-height: auto; padding:4.5rem 0 3rem; } }
@media (max-width: 768px) {
  .profile-avatar { width:180px!important; height:180px!important; }
  .header-subtitle { font-size:1.2rem; }
  .hero-subtitle { font-size:.95rem; margin: .75rem auto 1.75rem; }
  .cta-section { flex-direction:column; }
  .cta-primary, .cta-secondary { width:280px; max-width:92vw; }
  .skills-grid { grid-template-columns:1fr; }
  .stat-number { font-size:1.9rem; }
  .content-section .v-col { 
    flex-direction: column; 
  }
  .material-card {
    height: auto !important;
  }
}
@media (max-width: 480px) {
  .display-1 { font-size:2.4rem!important; }
  .cta-primary, .cta-secondary { width:250px!important; }
  .header-subtitle { font-size:1.05rem; }
}
</style>