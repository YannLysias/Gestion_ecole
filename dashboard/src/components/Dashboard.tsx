import { useEffect, useState } from "react"
import PageHeader from "./PageHeader"
 export interface Eleve {
    gacons: number,
    filles: number,
    passants: number,
    redoublants: number
}

export interface Tuteurs {
    hommes: number,
    femmes: number
}
export interface Enseignant {
    hommes: number,
    femmes: number
}

export interface Statistiques {
    eleves: Eleve
    tuteurs: Tuteurs
    enseignant: Enseignant
}

export default function Dashboard() {

    const [statistiques, setStatistiques] = useState<Statistiques | undefined>(undefined)

    useEffect(() => {
        fetch('http://127.0.0.1:8000/api/statistiques')
            .then(res => res.json())
            .then(data => {
                setStatistiques(data.statistiques)
            }).catch(error => {
                console.log('=======================error===================')
                console.log(error)
            })
    }, [])

    return (

            <div className="flex item-center flex-col  overflow-y-scrol h-full">
                    <PageHeader breadcumb={[{text:'Tableau de board',link:"/dashboard"}]}/>

                <div className="flex flex-col md:flex-row justify-center md:flex-wrap  w-full gap-6 mb-6">
                    <div className="md:flex-1 md:min-w-72 shadow-lg p-4 flex bg-slate-50 ">
                        <h1 className="text-8xl">{(statistiques?.enseignant.hommes ?? 0) + (statistiques?.enseignant.femmes ?? 0)}</h1><span className="pb-2 pl-2 text-lg sm:text-xl self-end">enseignants</span>
                    </div>
                    <div className="md:flex-1 md:min-w-72 shadow-lg p-4 flex bg-slate-50 ">
                        <h1 className="text-8xl">{(statistiques?.tuteurs.hommes ?? 0) + (statistiques?.tuteurs.femmes ?? 0)}</h1><span className="pb-2 pl-2 text-lg sm:text-xl self-end">tuteurs</span>
                    </div>
                    <div className="md:flex-1 md:min-w-72 shadow-lg p-4 flex bg-slate-50 ">
                        <h1 className="text-8xl">{(statistiques?.eleves.gacons ?? 0) + (statistiques?.eleves.filles ?? 0)}</h1><span className="pb-2 pl-2 text-lg sm:text-xl self-end">eleves</span>
                    </div>
                </div>
                <div className="flex-col gap-4 flex-1 flex lg:flex-row">
                    <div className="lg:w-1/3  min-h-96 w-full border-gray-300 border-2 pl-2 pt-2 bg-slate-50">
                        <span className="font-medium">Activites recentes</span>
                        <div></div>
                    </div>
                    <div className="lg:w-2/3 w-full min-h-96 border-gray-300 border-2 pl-2 pt-2 bg-slate-50">
                        <span className="font-medium">Notification</span>
                        <div></div>
                    </div>
                </div>
            </div>
        
    )
}
