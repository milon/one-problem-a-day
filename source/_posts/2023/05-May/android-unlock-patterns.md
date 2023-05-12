---
extends: _layouts.post
section: content
title: Android unlock patterns
problemUrl: https://leetcode.com/problems/android-unlock-patterns/
date: 2023-05-12
categories: [backtracking]
---

We can use backtracking to solve the problem. We will start from the first number and try to find all possible patterns. We will use a hashmap to store the numbers that are already used. Now we will try to find all possible patterns starting with the current number. We will use a loop to iterate over all possible numbers. If the number is not used, we will add it to the hashmap and call the function recursively. After the function returns, we will remove the number from the hashmap. Finally, we will return the result. We will use a hashmap to store the results of the subproblems. Now we will calculate all possible starting with values and return the largest one.

```python
class Solution:
    def numberOfPatterns(self, m: int, n: int) -> int:
        skip = {
            (1,7): 4,
            (1,3): 2,
            (1,9): 5,
            (2,8): 5,
            (3,7): 5,
            (3,9): 6,
            (4,6): 5,
            (7,9): 8
        }
        
        self.res = 0
        
        def bfs(used, last):
            if len(used) >= m:
                self.res += 1
                
            if len(used) == n:
                return
            
            for j in range(1, 10):
                if j not in used:   # if j is not used
                    # Sort the vertices of the edge to search in skip
                    edge = (min(last, j), max(last, j))
                    if edge not in skip or skip[edge] in used:
                        bfs(used + [j], j)
        
        for i in range(1, 10):
            bfs([i], i)
            
        return self.res
```

Time complexity: `O(n!)` <br/>
Space complexity: `O(n)`