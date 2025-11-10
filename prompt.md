## **ADMIN DASHBOARD BUILD PROMPT**

### **Project Context**
You are building a **premium admin dashboard** for Excel Football Academy using **Laravel Livewire v3** and **Tailwind CSS**. The dashboard should manage enrollments, contact inquiries, gallery images, and user accounts with a professional, modern interface.

### **Design System Reference**
Your design system is already established:
- **Primary Color**: Football Blue (HSL: 217° 85% 52%)
- **Secondary Color**: Premium Orange (HSL: 24° 90% 50%)
- **Shadows**: `shadow-premium`, `shadow-premium-lg`, `shadow-premium-hover` + sm/md/xl variants
- **Animations**: `animate-fade-in`, `animate-slide-up`, `animate-scale-in` (all 600ms)
- **Font**: Figtree (default throughout)
- **Border Color**: `border-border`, `bg-background`, `text-foreground`, `text-muted-foreground`
- **Theme**: Light/dark mode support with HSL colors

### **Required Pages & Features**

#### **1. Dashboard Home (`/dashboard`)**
- **Overview Stats Cards**:
  - Total Enrollments (with Lucide icon, number, trend arrow)
    - Icon: `Users` or `ClipboardList`
    - Shows trend: ↑ 12% this month
  - Total Contact Inquiries (with Lucide icon, number, status breakdown)
    - Icon: `Mail`
    - Shows: "5 new, 3 pending"
  - Total Gallery Images (with Lucide icon, number)
    - Icon: `Images`
  - New Inquiries (last 24h)
    - Icon: `AlertCircle`
    - Highlight in orange if > 0
- **Charts Section**:
  - **Enrollments Over Time** (Line Chart):
    - X-axis: Last 30 days
    - Y-axis: Number of enrollments
    - Blue line with gradient fill
    - Hover tooltips with exact count
    - Library: Chart.js or Alpine.js with SVG
  - **Inquiry Status Breakdown** (Pie/Doughnut Chart):
    - Segments: New, Read, Responded, Archived
    - Colors: Primary, orange, green, gray
    - Legend below chart
    - Click segments to filter
- **Recent Activity Tables**:
  - **Latest 5 Enrollments**:
    - Columns: Name, Email, Status Badge, Date
    - Sortable by date/name
    - Status badges: Pending (orange), Approved (green), Rejected (red)
  - **Latest 5 Contact Inquiries**:
    - Columns: Name, Subject, Status Badge, Date
    - Status badges: New (blue), Read (gray), Responded (green), Archived (muted)

#### **2. Enrollments Manager (`/dashboard/enrollments`)**
- **Premium Table View**:
  - **Columns** (Left to Right):
    - ID (small, muted)
    - Name (bold, primary text)
    - Email (muted, smaller)
    - Age (center aligned)
    - State (center aligned)
    - Status (Badge: Pending/Approved/Rejected)
    - Date (muted, smaller)
    - Actions (Lucide icons in dropdown)
  - **Row Styling**:
    - Hover: Light background highlight + shadow
    - Alternate row colors (subtle)
    - Selected rows: Checkbox + blue background
  - **Table Header**:
    - Sortable columns (click to sort, arrow indicator)
    - Select all checkbox (top-left)
    - Sticky header (stays on scroll)
  - **Pagination** (Bottom):
    - Previous/Next buttons (with icons: `ChevronLeft`/`ChevronRight`)
    - Page numbers with active state
    - "Showing X-Y of Z entries"
    - Items per page dropdown (25, 50, 100)
- **Search & Filter Bar** (Above table):
  - Search input: "Search by name or email..." (Icon: `Search`)
  - Status filter dropdown: All, Pending, Approved, Rejected
  - State filter dropdown: All states
  - Clear filters button (if any active)
- **Action Column Icons** (Lucide):
  - View/Eye icon → Open detail view modal
  - Edit/Pencil icon → Edit status/info
  - Trash icon → Delete (with confirmation)
  - Download/Download icon → Export enrollment as PDF
  - Dropdown menu (three dots) → More actions
- **Bulk Actions** (Top-right when items selected):
  - "Approve Selected" button (with count)
  - "Reject Selected" button (with count)
  - "Export as CSV" button (with Download icon)
- **Individual Enrollment Modal**:
  - Modal title: "Enrollment Details - [Name]"
  - Two columns (left: data, right: status/actions)
  - All 25 fields grouped by section:
    - Personal Info (firstName, surname, age, dob, etc.)
    - Location (lga, state, country, etc.)
    - Academic Info (jerseyPreference, favoriteTeam, etc.)
  - Status change buttons: Approve | Reject | Pending
  - Close/Save buttons at bottom

#### **3. Contact Inquiries Manager (`/dashboard/inquiries`)**
- **Premium Table View**:
  - **Columns**:
    - ID (small, muted)
    - Name (bold)
    - Email (muted)
    - Subject (truncate with ellipsis)
    - Status (Badge)
    - Date (muted, smaller)
    - Actions (Lucide icons)
  - **Same features as Enrollments table**:
    - Sortable headers
    - Hover effects
    - Sticky header
    - Pagination
- **Search & Filter**:
  - Search: "Search by name or subject..."
  - Status filter: New, Read, Responded, Archived
  - Date range filter (optional)
- **Action Icons**:
  - Eye icon → Open detail/preview modal
  - Reply/Mail icon → Open reply composer
  - Check icon → Mark as responded
  - Trash icon → Delete (confirmation)
  - Dropdown (three dots) → Archive, unread, etc.
- **Inquiry Detail Modal**:
  - Sender info box (name, email, date)
  - Full message body (scrollable)
  - Internal notes section (editable, timestamped)
  - Status change buttons
  - Reply composer (if not yet responded)
  - Close button

#### **4. Gallery Manager (`/dashboard/gallery`)**
- **Grid View** (Responsive):
  - **Desktop (LG)**: 4 columns
  - **Tablet (MD)**: 3 columns
  - **Mobile (SM)**: 2 columns
  - **Card Design** (per image):
    - Thumbnail image (aspect ratio 16:9, lazy load)
    - Hover overlay with quick actions:
      - Eye icon (preview full image)
      - Pencil icon (edit title/description)
      - Trash icon (delete)
    - Title & description below thumbnail
    - Upload date (small, muted)
- **Upload Section** (Top of page):
  - Drag & drop zone (dashed border, primary color on hover)
  - Upload button (primary color)
  - File input (hidden, triggered by drop or click)
  - Preview after selection (thumbnail + details)
  - Form: Title input, Description textarea, Cancel/Upload buttons
- **Filter/Search**:
  - Search by title
  - Sort by: Date uploaded (newest/oldest), Alphabetical
  - Items per page selector

#### **5. Users Manager (`/dashboard/users`)**
- **Premium Table View**:
  - **Columns**:
    - ID
    - Name (bold)
    - Email
    - Role (Badge: Admin, Editor, Viewer)
    - Status (Badge: Active, Inactive)
    - Date Joined (muted)
    - Actions (Lucide icons)
  - **Row Styling**: Same premium table styling
- **Create User Button** (Top-right):
  - Primary color button with Plus icon
  - Opens modal with form
- **Action Icons**:
  - Edit/Pencil icon → Open edit modal
  - Trash icon → Delete (confirmation)
  - Dropdown (three dots):
    - Change password
    - Deactivate/Activate
    - View activity log
- **Edit/Create User Modal**:
  - Form fields: Name, Email, Role dropdown, Password (on create)
  - Validation messages
  - Save/Cancel buttons

#### **6. Settings (`/dashboard/settings`)**
- **Tab Layout**:
  - Tabs: General, Email, Application
  - Tab indicator shows active (blue underline)
- **General Settings Tab**:
  - Form fields: Academy name, Email, Phone, Address
  - Save button with loading state
- **Email Settings Tab**:
  - SMTP Config: Host, Port, Username, Password (masked input)
  - From name, From address
  - Test Email button (sends test to current user)
  - Success/error message display
- **Application Settings Tab**:
  - Site title input
  - Logo upload (current logo preview)
  - Favicon upload (current favicon preview)
  - Save button

### **Layout & Navigation**

#### **Dashboard Layout Structure - Desktop (LG screens)**
```
┌─────────────────────────────────────────────────────────────┐
│         Top Navigation Bar                                  │
│  Logo  Search  User Menu  Notifications  Theme Toggle       │
└─────────────────────────────────────────────────────────────┘
┌──────────────────┬──────────────────────────────────────────┐
│                  │                                          │
│  Sidebar Nav     │    Main Content Area                     │
│  (Sticky, 240px) │    (Auto adjusts width)                  │
│  Full Labels     │                                          │
│                  │                                          │
│  • Dashboard     │                                          │
│  • Enrollments   │                                          │
│  • Inquiries     │                                          │
│  • Gallery       │                                          │
│  • Users         │                                          │
│  • Settings      │                                          │
│  • Logout        │                                          │
│                  │                                          │
└──────────────────┴──────────────────────────────────────────┘
```

#### **Dashboard Layout Structure - Mobile/Tablet (SM screens)**
```
┌─────────────────────────────────────────┐
│    Top Bar (Compact)                    │
│  Logo  Search  User Menu  Notifications │
└─────────────────────────────────────────┘
│                                         │
│      Main Content Area                  │
│      (Full Width)                       │
│                                         │
│                                         │
├─────────────────────────────────────────┤
│    Bottom Navigation (Native Style)     │
│  🏠  📋  ✉️  🖼️  👥  ⚙️                    │
│ Dash Enrol Inq  Gal Users Set          │
└─────────────────────────────────────────┘
```

#### **Sidebar Navigation (LG Screens)**
- **Navigation Items** (with Lucide icons):
  - Dashboard (Home icon)
  - Enrollments (ClipboardList icon)
  - Contact Inquiries (Mail icon)
  - Gallery (Images icon)
  - Users (Users icon)
  - Settings (Settings icon)
- **Bottom Section**:
  - Theme Toggle (Moon/Sun icon)
  - Logout (LogOut icon)
- **Styling**:
  - Sticky position (doesn't scroll with content)
  - Hover: Background highlight with smooth transition
  - Active state: Primary blue highlight + left border accent
  - Logo at top with text (full width)
  - Smooth collapse animation

#### **Bottom Navigation (SM Screens - Mobile/Tablet)**
- **Fixed Position** at bottom of screen
- **Native Mobile Feel**:
  - Icon-only layout (text label below icon)
  - 6 items: Dashboard, Enrollments, Inquiries, Gallery, Users, Settings
  - Active item: Blue icon + underline
  - Inactive items: Gray icons
  - Touch-friendly: ~56px height per spec
- **Lucide Icons** (All consistent size, weight):
  - Dashboard: `Home`
  - Enrollments: `ClipboardList`
  - Inquiries: `Mail`
  - Gallery: `Images`
  - Users: `Users`
  - Settings: `Settings`

#### **Responsive Breakpoints**
- **LG (≥1024px)**: Show sidebar + main content (sidebar visible)
- **MD (768px - 1023px)**: Sidebar collapsed to icons only (60px width)
- **SM (< 768px)**: Hide sidebar, show bottom nav + main content (pb-20 on main)
- **Main Content**: `flex-1` to fill remaining space on LG, full width on SM

#### **Top Navigation Bar (All Screens)**
- Left: Academy Logo + Title
- Center: Search bar (hidden on SM)
- Right: 
  - Notifications bell (with badge count)
  - Theme toggle (Moon/Sun icon - Lucide)
  - User dropdown menu (avatar + name)
  - Language selector (optional)

### **Key Features**

1. **Authentication & Authorization**
   - Only admins can access dashboard
   - Middleware: `auth` + check role = 'admin'
   - Logout functionality

2. **Real-time Updates** (Livewire)
   - Live search as you type
   - Status updates without full page reload
   - Delete confirmation modals

3. **Error Handling**
   - Validation error messages
   - Success/error toast notifications
   - Empty state messages (no data)

4. **Performance**
   - Pagination for large datasets
   - Lazy loading images in gallery
   - Search debouncing

5. **Visual Feedback**
   - Loading spinners (like login form)
   - Hover effects on rows/buttons
   - Smooth transitions
   - Icons for all actions (edit, delete, view, etc.)

### **UI Components to Create**

#### **Navigation Components**

1. **Sidebar (LG Screens)**
   - Logo section at top (full width)
   - Navigation links with Lucide icons:
     - Home, ClipboardList, Mail, Images, Users, Settings
   - Active state: Primary blue left border + background highlight
   - Hover state: Smooth background transition
   - Fixed/sticky positioning
   - Bottom section: Theme toggle + Logout

2. **Bottom Navigation (SM Screens)**
   - Fixed at bottom (56px height)
   - 6 navigation items (icon + label)
   - Active: Blue icon + underline
   - Touch-friendly spacing
   - Background: Elevated shadow

3. **Top Navigation Bar**
   - Left: Logo + Title
   - Center: Search input (hidden on SM)
   - Right: Notifications bell, Theme toggle, User dropdown
   - Lucide icons: Search, Bell, Moon/Sun, User, ChevronDown

#### **Data Display Components**

4. **Stat Card**
   - Icon (Lucide, large)
   - Title (muted text)
   - Main number (large, bold)
   - Trend indicator (arrow + %)
   - Hover: Shadow increase, slight lift animation
   - Responsive: Stacks on SM screens

5. **Premium Data Table**
   - Header row: Sortable columns, checkboxes, icons
   - Body rows: Alternating subtle background colors
   - Hover effects: Row highlight + shadow
   - Sticky header on scroll
   - Responsive: Horizontal scroll on SM
   - Action column: Lucide icon buttons (Eye, Pencil, Trash, MoreVertical)
   - Icons from Lucide: Eye, Edit, Trash2, MoreVertical, ChevronDown

6. **Status Badge** (Reusable component)
   - Color variants: Blue (new), Green (approved), Orange (pending), Red (rejected), Gray (archived)
   - Icon optional (with Lucide icon)
   - Text: Capitalized status
   - Padding: Compact size

7. **Modal**
   - Header: Title + close button (X icon: Lucide `X`)
   - Body: Content area (scrollable)
   - Footer: Action buttons (Save, Cancel, Delete)
   - Overlay: Semi-transparent dark
   - Animation: Fade + scale in

8. **Toast Notification**
   - Position: Top-right corner
   - Types: Success (green), Error (red), Info (blue), Warning (orange)
   - Icon: Lucide icons (CheckCircle, AlertCircle, Info, AlertTriangle)
   - Close button: X icon
   - Auto-dismiss after 5 seconds
   - Stack multiple toasts

9. **Pagination**
   - Previous/Next buttons (with Lucide icons: ChevronLeft, ChevronRight, ChevronsLeft, ChevronsRight)
   - Page numbers
   - "Showing X-Y of Z"
   - Items per page dropdown
   - Disabled state styling

10. **Dropdown Menu**
    - Trigger button with icon (MoreVertical or ChevronDown)
    - Menu items with optional icons (from Lucide)
    - Hover highlighting
    - Keyboard support (arrow keys)

11. **Search/Filter Bar**
    - Search input with Search icon (Lucide)
    - Filter dropdowns
    - Clear button (X icon)
    - Responsive: Stacks on SM

12. **Loading Spinner** (Like login form)
    - SVG spinner animation
    - Used in buttons, pages, data loading
    - Overlay option for full-page loading

#### **Chart Components**

13. **Line Chart** (Enrollments over time)
    - Library: Chart.js with Alpine.js or Apex Charts
    - X-axis: Last 30 days
    - Y-axis: Count
    - Blue line with gradient fill below
    - Hover tooltips: Date + count
    - Responsive: Resizes on window change
    - Colors: Primary blue (#D98E3D in HSL)

14. **Pie/Doughnut Chart** (Inquiry status)
    - Segments by status: New (blue), Read (gray), Responded (green), Archived (muted)
    - Legend below with clickable items
    - Hover: Highlight segment + tooltip
    - Responsive sizing

#### **Form Components**

15. **Input Field** (Standard)
    - Label (optional)
    - Input field with border
    - Focus state: Blue ring
    - Error message display (red text below)
    - Helper text (muted)

16. **Select/Dropdown Input**
    - Label
    - Dropdown with options
    - Search in dropdown (optional)
    - Selected value display
    - Focus state

17. **Textarea**
    - Multi-line input
    - Resizable
    - Character counter (optional)
    - Focus state: Blue ring

18. **File Upload**
    - Drag & drop zone
    - Click to browse
    - Preview thumbnail
    - Progress bar on upload
    - File validation messages

19. **Image Preview**
    - Thumbnail display
    - Lazy loading
    - Click to expand/modal
    - Delete button overlay

### **Database Models to Use**
- `User` - Admin users (already exists)
- `Enrollment` - 25 fields (already exists)
- `ContactInquiry` - Contact form submissions (already exists)
- `GalleryImage` - Gallery images (already exists)

### **Routes to Create**
```php
Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(function () {
    Route::get('/', DashboardHome::class)->name('dashboard');
    Route::get('/enrollments', EnrollmentsManager::class)->name('enrollments');
    Route::get('/inquiries', InquiriesManager::class)->name('inquiries');
    Route::get('/gallery', GalleryManager::class)->name('gallery');
    Route::get('/users', UsersManager::class)->name('users');
    Route::get('/settings', Settings::class)->name('settings');
});
```

### **Design Notes**
- Use the same premium shadow system as the main site
- Maintain consistent spacing (8px grid)
- All buttons should use primary/secondary colors
- Icons from Heroicons (SVG)
- Dark mode support with HSL colors
- Mobile-first responsive design

### **Success Criteria**
✅ Dashboard loads data from database  
✅ CRUD operations work (create, read, update, delete)  
✅ Search/filter/sort functionality working  
✅ Responsive on mobile, tablet, desktop  
✅ Professional premium appearance  
✅ Loading states with spinners  
✅ Error handling & validation  
✅ All tables have pagination  