import React from 'react'
import PageHeader from './PageHeader'

export default function Admin() {
  return (
    <div><PageHeader breadcumb={[{text:'Administrateur',link:"/dashboard/admin"},{ text: 'Niveau', link: "/dashboard/niveau" },{ text: 'Niveau', link: "/dashboard/niveau" }]}/></div>
  )
}
