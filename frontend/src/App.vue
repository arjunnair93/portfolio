<template>
  <v-app>
    <v-app-bar app class="glass-bar" elevation="0">
      <v-app-bar-nav-icon 
        @click="drawer = !drawer"
        class="d-md-none"
        aria-label="Toggle navigation"
      ></v-app-bar-nav-icon>
      <v-toolbar-title class="font-weight-bold text-h5 text-primary">
        {{ appTitle }}
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn
        icon
        class="theme-toggle-btn"
        @click="toggleTheme"
        :aria-label="isDark ? 'Switch to light mode' : 'Switch to dark mode'"
      >
        <v-icon size="28">{{ isDark ? 'mdi-white-balance-sunny' : 'mdi-moon-waning-crescent' }}</v-icon>
      </v-btn>
      <template #append>
        <div class="toolbar-socials">
          <v-btn icon href="https://github.com/arjunnair93" target="_blank" aria-label="GitHub" class="toolbar-social-btn">
            <v-icon size="24">mdi-github</v-icon>
          </v-btn>
          <v-btn icon href="https://www.linkedin.com/in/arjun-nair-0b516a46/" target="_blank" aria-label="LinkedIn" class="toolbar-social-btn">
            <v-icon size="24">mdi-linkedin</v-icon>
          </v-btn>
          <v-btn icon href="mailto:arjurokz@gmail.com" aria-label="Email" class="toolbar-social-btn">
            <v-icon size="24">mdi-email</v-icon>
          </v-btn>
        </div>
      </template>
    </v-app-bar>

    <v-navigation-drawer 
      v-model="drawer" 
      app
      :permanent="display.mdAndUp.value"
      :temporary="display.smAndDown.value"
      class="glass-drawer"
    >
      <v-list nav>
        <v-list-item 
          v-for="item in navigationItems"
          :key="item.to"
          :to="item.to" 
          :prepend-icon="item.icon"
          :active="$route.path === item.to"
          :class="{ 'v-list-item--active text-primary font-weight-bold': $route.path === item.to }"
          color="primary"
          class="mb-2 nav-item-modern"
          @click="handleNavigation"
        >
          <v-list-item-title class="text-body-1">{{ item.title }}</v-list-item-title>
        </v-list-item>
      </v-list>

      <template v-slot:append>
        <v-divider></v-divider>
        <v-list-item class="d-flex justify-center mt-2">
          <v-btn 
            icon 
            href="https://github.com/yourprofile" 
            target="_blank"
            aria-label="GitHub"
            class="social-btn"
          >
            <v-icon size="24">mdi-github</v-icon>
          </v-btn>
          <v-btn 
            icon 
            href="https://linkedin.com/in/yourprofile" 
            target="_blank"
            aria-label="LinkedIn"
            class="social-btn"
          >
            <v-icon size="24">mdi-linkedin</v-icon>
          </v-btn>
          <v-btn 
            icon 
            href="mailto:youremail@example.com"
            aria-label="Email"
            class="social-btn"
          >
            <v-icon size="24">mdi-email</v-icon>
          </v-btn>
        </v-list-item>
        <v-list-item>
          <v-list-item-title class="text-caption text-center mt-2">
            © 2025 Portfolio
          </v-list-item-title>
        </v-list-item>
      </template>
    </v-navigation-drawer>

    <v-main>
      <div class="main-content-wrapper">
        <v-fade-transition mode="out-in">
          <router-view></router-view>
        </v-fade-transition>
      </div>
    </v-main>

    <v-footer app height="60" class="glass-footer">
      <v-container class="text-center text-caption">
        Made with <span style="color:#e25555;">❤️</span> using <b>Vue 3</b> & <b>Vuetify</b> — All rights reserved.
      </v-container>
    </v-footer>
  </v-app>
</template>

<script lang="ts">
import { defineComponent, ref, computed, watch } from 'vue'
import { useRoute } from 'vue-router'
import { useTheme, useDisplay } from 'vuetify'

interface NavigationItem {
  to: string
  icon: string
  title: string
}

export default defineComponent({
  name: 'App',
  setup() {
    const route = useRoute()
    const theme = useTheme()
    const display = useDisplay()

    const drawer = ref(false)
    const appTitle = ref('Portfolio')

    const navigationItems: NavigationItem[] = [
      { to: '/', icon: 'mdi-home', title: 'Home' },
      { to: '/projects', icon: 'mdi-folder-multiple', title: 'Projects' },
      { to: '/skills', icon: 'mdi-flash', title: 'Skills' },
      { to: '/contact', icon: 'mdi-email', title: 'Contact' }
    ]

    const isDark = computed(() => theme.global.name.value === 'dark')

    const toggleTheme = () => {
      theme.global.name.value = isDark.value ? 'light' : 'dark'
      localStorage.setItem('preferred-theme', theme.global.name.value)
    }

    const handleNavigation = () => {
      if (display.smAndDown.value) {
        drawer.value = false
      }
    }

    watch(
      () => route.path,
      () => {
        if (display.smAndDown.value) {
          drawer.value = false
        }
      }
    )

    // Load preferred theme from localStorage on setup
    const storedTheme = localStorage.getItem('preferred-theme')
    if (storedTheme === 'light' || storedTheme === 'dark') {
      theme.global.name.value = storedTheme
    }

    return { 
      drawer,
      appTitle,
      navigationItems,
      isDark,
      toggleTheme,
      handleNavigation,
      route,
      display
    }
  }
})
</script>

<style>
@import '@mdi/font/css/materialdesignicons.css';

body {
  background: linear-gradient(135deg, #e3f0ff 0%, #fafcff 100%);
}

.glass-bar {
  background: rgba(255,255,255,0.7) !important;
  backdrop-filter: blur(12px);
  box-shadow: 0 4px 24px 0 rgba(0,0,0,0.04);
  border-bottom: 1px solid #e0e0e0;
  border-radius: 0 0 16px 16px;
}

.theme--dark .glass-bar {
  background: rgba(0,0,0,0.95) !important;
  border-bottom: 1px solid #333;
  box-shadow: 0 4px 24px 0 rgba(0,0,0,0.3);
}

.v-theme--dark .glass-bar {
  background: #121212 !important;
  border-bottom: 1px solid #333 !important;
  box-shadow: 0 4px 24px 0 rgba(0,0,0,0.3) !important;
}

body.v-theme--dark .glass-bar {
  background: #121212 !important;
  border-bottom: 1px solid #333 !important;
}

.glass-drawer {
  background: rgba(255,255,255,0.8) !important;
  backdrop-filter: blur(16px);
  border-right: 1px solid #e0e0e0;
  box-shadow: 2px 0 24px 0 rgba(0,0,0,0.03);
  border-radius: 0 16px 16px 0;
}

.glass-footer {
  background: rgba(255,255,255,0.7) !important;
  backdrop-filter: blur(8px);
  border-top: 1px solid #e0e0e0;
  box-shadow: 0 -2px 12px 0 rgba(0,0,0,0.02);
  border-radius: 16px 16px 0 0;
}

.main-content-wrapper {
  min-height: calc(100vh - 120px);
  width: 100%;
  border-radius: 24px 24px 0 0;
  overflow: hidden;
}

.theme-toggle-btn {
  margin-right: 8px;
  background: rgba(25, 118, 210, 0.08) !important;
  border-radius: 50%;
  transition: background 0.2s;
}
.theme-toggle-btn:hover {
  background: rgba(25, 118, 210, 0.18) !important;
}

.nav-item-modern {
  border-radius: 12px;
  transition: background 0.2s, color 0.2s;
  font-weight: 500;
  font-size: 1.08rem;
}
.nav-item-modern.v-list-item--active {
  background: linear-gradient(90deg, #1976d2 0%, #64b5f6 100%) !important;
  color: #fff !important;
  box-shadow: 0 2px 8px 0 rgba(25,118,210,0.08);
}

.social-btn {
  margin: 0 4px;
  color: #1976d2 !important;
  background: rgba(25, 118, 210, 0.07) !important;
  border-radius: 50%;
  transition: background 0.2s;
}
.social-btn:hover {
  background: rgba(25, 118, 210, 0.18) !important;
}

/* Toolbar social icons (moved from template stray text) */
.toolbar-socials {
  display: flex;
  align-items: center;
  gap: 0.7rem;
  margin-left: 0.5rem;
}
.toolbar-social-btn {
  background: rgba(25, 118, 210, 0.08) !important;
  color: #1976d2 !important;
  border-radius: 50%;
  transition: background 0.2s;
}
.toolbar-social-btn:hover {
  background: rgba(25, 118, 210, 0.18) !important;
  color: #1565c0 !important;
}

.v-fade-transition-enter-active,
.v-fade-transition-leave-active {
  transition: opacity 0.3s cubic-bezier(.4,0,.2,1);
}
.v-fade-transition-enter-from,
.v-fade-transition-leave-to {
  opacity: 0;
}
</style>
