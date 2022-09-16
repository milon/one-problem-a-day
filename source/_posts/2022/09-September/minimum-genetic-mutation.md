---
extends: _layouts.post
section: content
title: Minimum genetic mutation
problemUrl: https://leetcode.com/problems/minimum-genetic-mutation/
date: 2022-09-16
categories: [graph]
---

We first convert the genetic sequence bank list to set for constant time lookup. If the end is not in bank, we immediately return -1. Else we start from start sequence, check every possible genetic sequence, and start traversing the decision tree with BFS. If in the process, we find the end node, we return the level, else we return -1.

```python
class Solution:
    def minMutation(self, start: str, end: str, bank: List[str]) -> int:
        bank = set(bank)
        
        if end not in bank:
            return -1
        
        q = collections.deque([(start, 1)])
        visited = set()
        while q:
            node, level = q.pop()
            for i in range(len(node)):
                for c in "ATGC":
                    neighbor = node[:i] + c + node[i+1:]
                    if neighbor in bank and neighbor not in visited:
                        visited.add(neighbor)
                        if neighbor == end:
                            return level
                        q.appendleft((neighbor, level+1))
        return -1
```

Time Complexity: `O(n)`, n is number of sequence in the bank. <br/>
Space Complexity: `O(n)`
