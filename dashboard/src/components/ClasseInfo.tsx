import { useEffect, useState } from 'react'
import PageHeader from './PageHeader'
import { Link, useParams } from 'react-router-dom'
export interface Classe {
  id: number
  nom: string
  effectif: number
}
export default function ClasseInfo() {

  const [classe, setClasse] = useState<Classe[] | undefined>(undefined)
  const { classeId } = useParams()

  useEffect(() => {
    fetch(`http://127.0.0.1:8000/api/niveaux/${classeId}`)
      .then(res => res.json())
      .then(data => {
        console.log(data.classes)
        setClasse(data.classes)
      }).catch(error => {
        console.log('=======================error===================')
        console.log(error)
      })
  }, [])

  return (
    <div className='flex item-center flex-col p-2 h-full overflow-y-scrol'>
      <PageHeader breadcumb={[{ text: 'Niveau', link: "/dashboard/niveau" }]} />
      <div className='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 pb-4'>
        {classe?.map((elem) => <Link className='rounded-lg shadow-sm aspect-[1/1] text-lg font-semibold w-full hover:bg-slate-100 p-8 mx-auto bg-white grid place-content-center' to={`/dashboard/niveau/${classeId}/classe/${elem?.id}`}><div className='flex flex-col items-center'>
          <span>{elem?.nom}</span>
          <span className='text-gray-500  pt-4'>{elem?.effectif} eleve{elem?.effectif > 1 && 's' }</span>
        </div>
        </Link>)}
      </div>
    </div>
  )
}
