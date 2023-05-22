---
extends: _layouts.post
section: content
title: Kth largest sum in a binary tree
problemUrl: https://leetcode.com/problems/kth-largest-sum-in-a-binary-tree/
date: 2023-05-21
categories: [heap, tree]
---

We will traverse the whole tree with BFS and store each levels sum in a list. Then, we will use a heap to get the `k`-th largest sum. We will also check if the tree doesn't have enough levels to reach k, then we return -1.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def kthLargestLevelSum(self, root: Optional[TreeNode], k: int) -> int:
        levels = []
        q = collections.deque([root])
        while q:
            qLen, levelSum = len(q), 0
            for _ in range(qLen):
                node = q.popleft()
                levelSum += node.val
                if node.left: q.append(node.left)
                if node.right: q.append(node.right)
            levels.append(levelSum)
        
        if len(levels) < k:
            return -1
        
        return heapq.nlargest(k, levels)[-1]
```

Time complexity: `O(nlog(k))` where n is the number of nodes in the tree. <br/>
Space complexity: `O(n)` where n is the number of nodes in the tree.