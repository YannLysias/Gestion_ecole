import './globals.css'
import SideNav from './components/SideNav'
import { Routes, Route } from 'react-router-dom'
import Tuteur from './components/Tuteur'
import Eleve from './components/Eleve'
import Admin from './components/Admin'
import Niveau from './components/Niveau'
import Presence from './components/Presence'
import Dashboard from './components/Dashboard'
import Classe from './components/Classe'

function App() {

  return (
    <Routes>
      <Route path='/dashboard' element={<SideNav />}>
        <Route index element={<Dashboard/>}/> 
        <Route path='tuteur' element={<Tuteur />} />
        <Route path='niveau' element={<Niveau />} />
        <Route path='admin' element={<Admin />} />
        <Route path='eleve' element={<Eleve />} />
        <Route path='presence' element={<Presence />} />
        <Route path='niveau' element={<Niveau/>} />
        <Route path='niveau/:id' element={<Classe/>} />
        <Route path='niveau/:id/classe/:classeId' element={<Classe/>} />
      </Route>

    </Routes>
  )
}

export default App
