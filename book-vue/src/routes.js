import Home from './components/Home'
import Book from './components/Books/Book'
import BookCreate from './components/Books/BookCreate'
import BookShelf from './components/Books/BookShelf'
import BookShelfCreate from './components/Books/CreateShelf'
import BookDetail from './components/Books/BookDetail'
import ShelfDetail from './components/Books/ShelfDetail'
import NewFeeds from './components/Books/NewFeeds'

const routes = [
    {
      path: '/',
      name: 'HomePage',
      component: Home,
    },
    {
      path: '/books',
      name: 'BookPage',
      component: Book,
    },
    {
      path: '/createbooks',
      name: 'CreateBookPage',
      component: BookCreate,
    },
    {
        path: '/bookshelf',
        name: 'BookShelfPage',
        component: BookShelf,
    },
    {
        path: '/bookshelf/create',
        name: 'BookShelfCreatePage',
        component: BookShelfCreate,
    },
    {
      path: '/bookshelf/detail/:id',
      name: 'ShelfDetailPage',
      component: ShelfDetail,
    },
    {
        path: '/newfeeds',
        name: 'NewFeedsPage',
        component: NewFeeds,
    },
    {
      path: '/books/detail/:id',
      name: 'BookDetailPage',
      component: BookDetail,
  },
  ]

  export default routes