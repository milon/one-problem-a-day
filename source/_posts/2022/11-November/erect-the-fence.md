---
extends: _layouts.post
section: content
title: Erect the fence
problemUrl: https://leetcode.com/problems/erect-the-fence/
date: 2022-11-19
categories: [math-and-geometry]
---

The problem is asking us to find the convex hull given a set of 2D points.

Monotone Chain algorithm:

1. Sort the points by x. (moving from left to right)
2. Initialize a stack with the first 2 points.
3. Starting from the thrid point (P3) in points , P1 = stack[-2] and P2 = stack[-1], if P3 is less counterclockwise to P1 than P2, pop P2 from the stack, keep doing this until P3 is more counterclockwise to P1 than P2 or if there is only one point left in the stack.
4. Append the current point to the stack and go to the next one.
5. Reverse points (moving from right to left), and repeat (2) - (4) to get the second Monotone Chain Stack.

What this algorithm does is, first going from left to right of the points, construct the lower hull (the bottom half of the hull). Then, going from right to left, construct the upper hull (top half of the hull).

The process (2)-(4) is very similar to construct a regular Monotonic Stack, but instead of mataining the stack monotonically increasing, we maintain the chain fromed by the points in the stack moving counterclockwise!

Now the problem is given 3 points (P1, P2, P3), how to figure out if the chain P1->P2->P3 is moving counterclockwise. This is done by doing a Cross Product of the two vectors formed by V1 = (P1,P2) and V2 = (P2,P3). If you forgot the meaning of cross product please take 2 minutes and watch this video HERE (Time: 00:40 to 02:20). So basically, if the cross product of V1 and V2 is positive, this chain is not moving counterclockwise (pop P2 from the stack). And if the cross product is negtive, this chain is moving counterclockwise (append P3 to the stack).

Cross product formula: <br/>
`V1 = (a,b), V2 = (c,d)` <br/>
`V1 X V2 = ad - bc`

```python
class Solution:
    def outerTrees(self, points: List[List[int]]) -> List[List[int]]:
        def crossProduct(p1: List[List[int]], p2: List[List[int]], p3: List[List[int]]):
            # V1 = (a,b), V2 = (c,d)
            # V1 X V2 = a*d - b*c
            a = p2[0]-p1[0]
            b = p2[1]-p1[1]
            c = p3[0]-p1[0]
            d = p3[1]-p1[1]    
            return a*d - b*c
        
        def constructHalfHull(points: List[List[int]]):
            stack = []
            for p in points:
                ### if the chain formed by the current point
                ### and the last two points in the stack is not counterclockwise, pop it
                while len(stack)>=2 and crossProduct(stack[-2],stack[-1],p)>0:
                    stack.pop()
                ### append the current point.
                stack.append(tuple(p))
            return stack
        
        points.sort()
        leftToRight = constructHalfHull(points)
        ### reverse points, so we are moving from right to left
        rightToLeft = constructHalfHull(points[::-1])
        
        ### it is posible that the top and bottom parts have same points (e.g., all points form a line)
        ### we remove the duplicated points using a set
        return list(set(leftToRight + rightToLeft))
```

Time complexity: `O(nlogn)` <br/>
Space complexity: `O(n)`