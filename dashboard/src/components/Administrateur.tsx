import React from 'react'
import PageHeader from './PageHeader'

export default function Administrateur() {
  return (
    <div><PageHeader breadcumb={[{text:'Administrateur',link:"/dashboard/admin"}]}/></div>
  )
}
