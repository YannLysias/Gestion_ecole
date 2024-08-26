import './globals.css'
import SideNav from './components/SideNav'
import { Routes, Route } from 'react-router-dom'
import Tuteur from './components/Tuteur'
import Eleve from './components/Eleve'
import Admin from './components/Admin'
import Classe from './components/Classe'
import Presence from './components/Presence'
import Dashboard from './components/Dashboard'

function App() {

  return (
    <Routes>
      <Route path='/dashboard' element={<SideNav />}>
        <Route index element={<Dashboard/>}/> 
        <Route path='tuteur' element={<Tuteur />} />
        <Route path='classe' element={<Classe />} />
        <Route path='admin' element={<Admin />} />
        <Route path='eleve' element={<Eleve />} />
        <Route path='presence' element={<Presence />} />
      </Route>
    </Routes>
  )
}

export default App
