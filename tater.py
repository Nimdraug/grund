import taters.locations
import locations
import re

def ignore( files ):
    for f in files:
        if re.match( '(tater\.py.?|locations\.py(.?|\.example))', f.name ):
            continue

        yield f

def build( files ):
    for f in files:
        yield f

def main( destination = 'local' ):
    here = taters.locations.git( '.' )

    there = getattr( locations, destination )

    here_revision = here.get_ref_commit()

    try:
        there_revision = taters.read_all( there.get( '.taters-version' ) )
    except Exception as e:
        print e
        there_revision = None

    there.destination( build( ignore( taters.debug_filter( here.source( there_revision, None, recursive = True ) ) ) ), overwrite = True )

    version_p = taters.pipe( '.taters-version' )
    version_p.w.write( here_revision )
    version_p.w.close()

    there.put( version_p.r )

if __name__ == '__main__':
    main()
