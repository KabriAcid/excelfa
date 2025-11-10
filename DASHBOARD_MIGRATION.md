# Admin Dashboard Migration Tasks

**Date**: November 10, 2025  
**Status**: In Progress  
**Objective**: Migrate React admin dashboard to Laravel Blade/Livewire with premium design system

---

## ✅ COMPLETED TASKS

### Phase 1: Project Analysis

-   [x] Analyzed React component structure
-   [x] Identified 6 main pages + 5 layout components
-   [x] Mapped component hierarchy
-   [x] Documented design system requirements

---

## 🔄 IN PROGRESS

### Phase 2: Layout Components (Priority 1)

-   [ ] Create DashboardLayout.blade.php (main wrapper)
-   [ ] Create Sidebar.blade.php (LG screens, fixed left)
-   [ ] Create BottomNav.blade.php (SM screens, fixed bottom)
-   [ ] Create TopNav.blade.php (search, notifications, user menu)
-   [ ] Create NavLink.blade.php (reusable nav item)

### Phase 3: Dashboard Components (Priority 2)

-   [ ] Create StatCard.blade.php (stats with icons, trends)
-   [ ] Create StatusBadge.blade.php (color-coded status labels)
-   [ ] Create PremiumTable.blade.php (sortable, filterable table)
-   [ ] Create Modal.blade.php (confirmation, detail views)
-   [ ] Create Toast.blade.php (notifications)

### Phase 4: Dashboard Pages (Priority 3)

-   [ ] Create DashboardHome.php Livewire component
-   [ ] Create Enrollments.php Livewire component
-   [ ] Create Inquiries.php Livewire component
-   [ ] Create Gallery.php Livewire component (different from public gallery)
-   [ ] Create Users.php Livewire component
-   [ ] Create Settings.php Livewire component

### Phase 5: Routes & Middleware (Priority 4)

-   [ ] Add admin routes to web.php with /admin prefix
-   [ ] Create admin middleware to check user role
-   [ ] Update login redirect to dashboard for admins
-   [ ] Protect all admin routes with auth + admin middleware

### Phase 6: Styling & Integration (Priority 5)

-   [ ] Apply design system colors (Football Blue, Orange)
-   [ ] Add Lucide icons throughout
-   [ ] Implement responsive breakpoints (LG sidebar, SM bottom nav)
-   [ ] Add loading states and transitions
-   [ ] Test all interactive features

---

## 📋 DETAILED TASK BREAKDOWN

### Layout Components

#### 1. DashboardLayout.blade.php

-   Wrapper for all admin pages
-   Conditional rendering: Sidebar (LG) or BottomNav (SM)
-   TopNav always visible
-   Main content area with proper spacing
-   Dark mode support

#### 2. Sidebar.blade.php (LG Screens)

-   Fixed left position, 240px width
-   Logo at top
-   Navigation items with Lucide icons:
    -   Home (dashboard)
    -   ClipboardList (enrollments)
    -   Mail (inquiries)
    -   Images (gallery)
    -   Users (users)
    -   Settings (settings)
-   Active state: Blue highlight + left border
-   Hover effects
-   Logout button at bottom

#### 3. BottomNav.blade.php (SM Screens)

-   Fixed bottom, 56px height
-   6 items: Dashboard, Enrollments, Inquiries, Gallery, Users, Settings
-   Icon + label
-   Active: Blue color + underline
-   Touch-friendly

#### 4. TopNav.blade.php

-   Left: Logo + Title
-   Center: Search (hidden on SM)
-   Right: Notifications, Theme toggle, User dropdown
-   Lucide icons throughout

#### 5. NavLink.blade.php

-   Reusable nav item
-   Props: href, icon, label, active
-   Hover/active states

### Dashboard Pages

#### 6. DashboardHome.php

-   4 stat cards (enrollments, inquiries, gallery, new)
-   Line chart (enrollments over time)
-   Pie chart (inquiry status breakdown)
-   Recent activity tables (5 latest enrollments, 5 latest inquiries)

#### 7. Enrollments.php

-   Premium table with all enrollment data
-   Search, filter, sort functionality
-   Bulk actions (approve, reject, export)
-   Detail modal for individual enrollment
-   Status change functionality

#### 8. Inquiries.php

-   Premium table with inquiry data
-   Search by name/subject
-   Filter by status
-   Detail modal with full message
-   Mark as read/responded
-   Reply functionality

#### 9. Gallery.php (Admin)

-   Grid view (4 cols LG, 3 MD, 2 SM)
-   Upload section (drag & drop)
-   Edit image details
-   Delete images
-   Image preview modal

#### 10. Users.php

-   Premium table with user data
-   Create new user
-   Edit user (name, email, role)
-   Change password
-   Deactivate/activate
-   Delete user

#### 11. Settings.php

-   Tab layout: General, Email, Application
-   Form fields for each section
-   Save functionality with loading state
-   Test email button

---

## 🎨 Design System Compliance

### Colors

-   Primary: Football Blue (HSL: 217° 85% 52%)
-   Secondary: Premium Orange (HSL: 24° 90% 50%)
-   Status colors: Green (approved), Orange (pending), Red (rejected), Blue (new), Gray (archived)

### Shadows

-   shadow-premium: Default card shadow
-   shadow-premium-lg: Elevated elements
-   shadow-premium-hover: Hover state

### Animations

-   animate-fade-in: 600ms
-   animate-slide-up: 600ms
-   animate-scale-in: 400ms

### Icons

-   Library: Lucide React → SVG inline
-   Consistent size: h-5 w-5
-   Colors: text-muted-foreground (default), text-foreground (active)

### Responsive

-   LG (≥1024px): Sidebar visible
-   MD (768px-1023px): Sidebar collapsed to icons
-   SM (<768px): Bottom nav, sidebar hidden

---

## 🔐 Authentication & Authorization

### Middleware

-   `auth`: Requires logged-in user
-   `admin`: Checks user role = 'admin'

### Routes

All admin routes: `/admin/*`

-   /admin (dashboard home)
-   /admin/enrollments
-   /admin/inquiries
-   /admin/gallery
-   /admin/users
-   /admin/settings

### Login Redirect

-   Admin users → /admin (dashboard)
-   Other users → /dashboard (basic dashboard)

---

## 📦 Dependencies

### Already Installed

-   Laravel 11
-   Livewire v3
-   Alpine.js
-   Tailwind CSS

### To Add

-   Lucide icons (SVG inline)
-   Chart.js or Alpine.js charts (for dashboard home)

---

## ✅ Success Criteria

-   [ ] All 6 pages functional
-   [ ] Sidebar shows on LG screens
-   [ ] Bottom nav shows on SM screens
-   [ ] All tables sortable, filterable, paginated
-   [ ] CRUD operations work (enrollments, inquiries, gallery, users)
-   [ ] Charts display correctly
-   [ ] Responsive on all screen sizes
-   [ ] Loading states for all actions
-   [ ] Design system 100% consistent
-   [ ] Admin middleware protecting routes
-   [ ] Login redirects to dashboard

---

## 🚀 Execution Order

1. ✅ Create this task file
2. → Create middleware for admin check
3. → Create layout components (DashboardLayout, Sidebar, BottomNav, TopNav)
4. → Create reusable components (StatCard, StatusBadge, etc.)
5. → Create dashboard pages (DashboardHome, Enrollments, etc.)
6. → Add routes to web.php
7. → Update login redirect logic
8. → Test all functionality
9. → Final styling polish

---

**Estimated Completion**: All tasks in one session
