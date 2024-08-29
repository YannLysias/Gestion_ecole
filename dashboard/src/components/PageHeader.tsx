import { ChevronRight, Slash, SlashIcon, SlashSquareIcon } from "lucide-react";
import { Link } from "react-router-dom";
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from "@/components/ui/breadcrumb"
import { LinkSlashIcon } from "@heroicons/react/24/solid";
export interface Breadcumb {
  text: string
  link: string
}
export default function PageHeader({ breadcumb }: { breadcumb: Breadcumb[] }) {


  return (

    <Breadcrumb >
      <BreadcrumbList>
        {
          breadcumb.map((item, index) => {
            if (index == breadcumb.length - 1) {
              return (
                <BreadcrumbItem key={index} className="text-primary text-2xl">
                  <BreadcrumbLink>
                    <Link to={item.link}>{item.text}</Link>
                  </BreadcrumbLink>
                </BreadcrumbItem>
              )

            }
            else return (
              <>
                <BreadcrumbItem key={index} className="text-primary text-2xl text-bold">
                  <BreadcrumbLink>
                    <Link to={item.link}>{item.text}</Link>
                  </BreadcrumbLink>
                </BreadcrumbItem>
                <BreadcrumbSeparator children={<ChevronRight  style={{ width: '24px', height: '24px', transform:'translateY(12%)' }} />} />
              </>
            )
          }
          )}
      </BreadcrumbList>
    </Breadcrumb>

  )
}
